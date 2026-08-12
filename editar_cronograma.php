<?php
require_once __DIR__ . '/auth.php';
iniciar_sessao();
exigir_login();
exigir_post();
exigir_csrf();

$id = inteiro_id();
$pdo = conectar();
$tarefa = texto_obrigatorio('tarefa');
$responsavel = texto_obrigatorio('responsavel');
$inicio = data_obrigatoria('inicio');
$prazo = data_obrigatoria('prazo');
$stmt = $pdo->prepare('UPDATE cronograma SET tarefa=?, responsavel=?, inicio=?, prazo=? WHERE id=?');
$ok = $stmt->execute([$tarefa, $responsavel, $inicio, $prazo, $id]);
if (!$ok) json_resposta(['erro' => 'Não foi possível editar o registro.'], 500);
json_resposta(['sucesso' => true]);
