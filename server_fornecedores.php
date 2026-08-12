<?php
require_once __DIR__ . '/auth.php';
iniciar_sessao();
exigir_login();
exigir_post();
exigir_csrf();

$pdo = conectar();
$nome = texto_obrigatorio('nome');
$contato = texto_obrigatorio('contato');
$material = texto_obrigatorio('material');
$data = data_obrigatoria('data');
$stmt = $pdo->prepare('INSERT INTO fornecedores (nome,contato,material,data) VALUES (?,?,?,?)');
$ok = $stmt->execute([$nome, $contato, $material, $data]);
json_resposta(['sucesso' => $ok, 'id' => (int)$pdo->lastInsertId()]);
