<?php
require_once __DIR__ . '/auth.php';
iniciar_sessao();
exigir_post();
exigir_csrf();

$usuario = trim((string)($_POST['usuario'] ?? ''));
$senha = (string)($_POST['senha'] ?? '');
if ($usuario === '' || $senha === '') json_resposta(['erro' => 'Preencha usuário e senha.'], 400);
if (mb_strlen($usuario) > 100 || mb_strlen($senha) > 255) json_resposta(['erro' => 'Dados inválidos.'], 400);

$pdo = conectar();
$stmt = $pdo->prepare('SELECT id, usuario, senha, nivel FROM usuarios WHERE usuario = ? LIMIT 1');
$stmt->execute([$usuario]);
$user = $stmt->fetch();

if (!$user || !password_verify($senha, $user['senha'])) {
    usleep(250000);
    json_resposta(['erro' => 'Usuário ou senha incorretos.'], 401);
}

if (password_needs_rehash($user['senha'], PASSWORD_DEFAULT)) {
    $novoHash = password_hash($senha, PASSWORD_DEFAULT);
    $up = $pdo->prepare('UPDATE usuarios SET senha=? WHERE id=?');
    $up->execute([$novoHash, $user['id']]);
}

session_regenerate_id(true);
$_SESSION['usuario_id'] = (int)$user['id'];
$_SESSION['usuario'] = $user['usuario'];
$_SESSION['nivel'] = $user['nivel'];
$_SESSION['csrf_token'] = bin2hex(random_bytes(32));

json_resposta(['sucesso' => true]);
