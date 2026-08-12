<?php
require_once __DIR__ . '/auth.php';
iniciar_sessao();
exigir_login();
exigir_post();
exigir_csrf();

$pdo = conectar();
$descricao = texto_obrigatorio('descricao');
$valor = numero_positivo('valor');
$data = data_obrigatoria('data');
$stmt = $pdo->prepare('INSERT INTO custos (descricao,valor,data) VALUES (?,?,?)');
$ok = $stmt->execute([$descricao, $valor, $data]);
json_resposta(['sucesso' => $ok, 'id' => (int)$pdo->lastInsertId()]);
