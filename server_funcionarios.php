<?php
require_once __DIR__ . '/auth.php';
iniciar_sessao();
exigir_login();
exigir_post();
exigir_csrf();

$pdo = conectar();
$nome = texto_obrigatorio('nome');
$cargo = texto_obrigatorio('cargo');
$salario = numero_positivo('salario');
$admissao = data_obrigatoria('admissao');
$stmt = $pdo->prepare('INSERT INTO funcionarios (nome,cargo,salario,admissao) VALUES (?,?,?,?)');
$ok = $stmt->execute([$nome, $cargo, $salario, $admissao]);
json_resposta(['sucesso' => $ok, 'id' => (int)$pdo->lastInsertId()]);
