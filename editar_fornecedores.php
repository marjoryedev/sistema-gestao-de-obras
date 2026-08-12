<?php
require_once __DIR__ . '/auth.php';
iniciar_sessao();
exigir_login();
exigir_post();
exigir_csrf();

$id = inteiro_id();
$pdo = conectar();
$nome = texto_obrigatorio('nome');
$contato = texto_obrigatorio('contato');
$material = texto_obrigatorio('material');
$data = data_obrigatoria('data');
$stmt = $pdo->prepare('UPDATE fornecedores SET nome=?, contato=?, material=?, data=? WHERE id=?');
$ok = $stmt->execute([$nome, $contato, $material, $data, $id]);
if (!$ok) json_resposta(['erro' => 'Não foi possível editar o registro.'], 500);
json_resposta(['sucesso' => true]);
