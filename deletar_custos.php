<?php
require_once __DIR__ . '/auth.php';
iniciar_sessao();
exigir_login();
exigir_post();
exigir_csrf();

$id = inteiro_id();
$pdo = conectar();
$stmt = $pdo->prepare('DELETE FROM custos WHERE id=?');
$stmt->execute([$id]);
if ($stmt->rowCount() === 0) json_resposta(['erro' => 'Registro não encontrado.'], 404);
json_resposta(['sucesso' => true]);
