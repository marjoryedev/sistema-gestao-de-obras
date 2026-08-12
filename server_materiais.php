<?php
require_once __DIR__ . '/auth.php';
iniciar_sessao();
exigir_login();
exigir_post();
exigir_csrf();

$pdo = conectar();
$nome = texto_obrigatorio('nome');
$quantidade = numero_positivo('quantidade');
$custo = numero_positivo('custo');
$data = data_obrigatoria('data');
$stmt = $pdo->prepare('INSERT INTO materiais (nome,quantidade,custo,data) VALUES (?,?,?,?)');
$ok = $stmt->execute([$nome, $quantidade, $custo, $data]);
json_resposta(['sucesso' => $ok, 'id' => (int)$pdo->lastInsertId()]);
