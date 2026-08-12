<?php
require_once __DIR__ . '/auth.php';
iniciar_sessao();
exigir_login();
exigir_post();
exigir_csrf();

$pdo = conectar();
$nome = texto_obrigatorio('nome');
$status = texto_obrigatorio('status');
$custo = numero_positivo('custo');
$data = data_obrigatoria('data');
$stmt = $pdo->prepare('INSERT INTO equipamentos (nome,status,custo,data) VALUES (?,?,?,?)');
$ok = $stmt->execute([$nome, $status, $custo, $data]);
json_resposta(['sucesso' => $ok, 'id' => (int)$pdo->lastInsertId()]);
