<?php
require_once __DIR__ . '/auth.php';
iniciar_sessao();
exigir_login();
exigir_post();
exigir_csrf();

$id = inteiro_id();
$pdo = conectar();
$nome = texto_obrigatorio('nome');
$cargo = texto_obrigatorio('cargo');
$salario = numero_positivo('salario');
$admissao = data_obrigatoria('admissao');
$stmt = $pdo->prepare('UPDATE funcionarios SET nome=?, cargo=?, salario=?, admissao=? WHERE id=?');
$ok = $stmt->execute([$nome, $cargo, $salario, $admissao, $id]);
if (!$ok) json_resposta(['erro' => 'Não foi possível editar o registro.'], 500);
json_resposta(['sucesso' => true]);
