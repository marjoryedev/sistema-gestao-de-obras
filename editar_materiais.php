<?php
require_once __DIR__ . '/auth.php';
iniciar_sessao();
exigir_login();
exigir_post();
exigir_csrf();

$id = inteiro_id();
$pdo = conectar();
$nome = texto_obrigatorio('nome');
$quantidade = numero_positivo('quantidade');
$custo = numero_positivo('custo');
$data = data_obrigatoria('data');
$stmt = $pdo->prepare('UPDATE materiais SET nome=?, quantidade=?, custo=?, data=? WHERE id=?');
$ok = $stmt->execute([$nome, $quantidade, $custo, $data, $id]);
if (!$ok) json_resposta(['erro' => 'Não foi possível editar o registro.'], 500);
json_resposta(['sucesso' => true]);
