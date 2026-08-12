<?php
require_once __DIR__ . '/db_config.php';

function iniciar_sessao(): void {
    if (session_status() === PHP_SESSION_NONE) {
        $secure = !empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off';
        session_set_cookie_params([
            'httponly' => true,
            'secure' => $secure,
            'samesite' => 'Lax',
        ]);
        session_start();
    }
}

function exigir_login(): void {
    iniciar_sessao();
    if (empty($_SESSION['usuario_id'])) {
        http_response_code(401);
        json_resposta(['erro' => 'Sessão expirada. Faça login novamente.'], 401);
    }
}

function exigir_post(): void {
    if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
        json_resposta(['erro' => 'Método não permitido.'], 405);
    }
}

function token_csrf(): string {
    iniciar_sessao();
    if (empty($_SESSION['csrf_token'])) {
        $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
    }
    return $_SESSION['csrf_token'];
}

function exigir_csrf(): void {
    iniciar_sessao();
    $token = $_POST['csrf_token'] ?? ($_SERVER['HTTP_X_CSRF_TOKEN'] ?? '');
    if (!$token || empty($_SESSION['csrf_token']) || !hash_equals($_SESSION['csrf_token'], $token)) {
        json_resposta(['erro' => 'Token de segurança inválido. Atualize a página e tente novamente.'], 419);
    }
}

function json_resposta(array $dados, int $status = 200): void {
    http_response_code($status);
    header('Content-Type: application/json; charset=utf-8');
    echo json_encode($dados, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
    exit;
}

function texto_obrigatorio(string $campo, int $max = 255): string {
    $valor = trim((string)($_POST[$campo] ?? ''));
    if ($valor === '') json_resposta(['erro' => 'Preencha todos os campos obrigatórios.'], 400);
    if (mb_strlen($valor) > $max) json_resposta(['erro' => "O campo {$campo} é muito longo."], 400);
    return $valor;
}

function inteiro_id(): int {
    $id = filter_var($_POST['id'] ?? null, FILTER_VALIDATE_INT, ['options' => ['min_range' => 1]]);
    if (!$id) json_resposta(['erro' => 'ID inválido.'], 400);
    return (int)$id;
}

function numero_positivo(string $campo, bool $permitir_zero = false): float {
    $raw = str_replace(',', '.', trim((string)($_POST[$campo] ?? '')));
    if ($raw === '' || !is_numeric($raw)) json_resposta(['erro' => "Valor inválido em {$campo}."], 400);
    $valor = (float)$raw;
    if ($permitir_zero ? $valor < 0 : $valor <= 0) json_resposta(['erro' => "O campo {$campo} deve ser maior que zero."], 400);
    return $valor;
}

function data_obrigatoria(string $campo): string {
    $valor = trim((string)($_POST[$campo] ?? ''));
    $dt = DateTime::createFromFormat('Y-m-d', $valor);
    if (!$dt || $dt->format('Y-m-d') !== $valor) json_resposta(['erro' => "Data inválida em {$campo}."], 400);
    return $valor;
}
