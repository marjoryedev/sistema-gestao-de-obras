<?php
require_once __DIR__ . '/auth.php';
iniciar_sessao();
exigir_login();
exigir_post();
exigir_csrf();

$id = inteiro_id();
$pdo = conectar();
$descricao = texto_obrigatorio('descricao');
$valor = numero_positivo('valor');
$data = data_obrigatoria('data');
$stmt = $pdo->prepare('UPDATE custos SET descricao=?, valor=?, data=? WHERE id=?');
$ok = $stmt->execute([$descricao, $valor, $data, $id]);
if (!$ok) json_resposta(['erro' => 'Não foi possível editar o registro.'], 500);
json_resposta(['sucesso' => true]);
