<?php
require_once __DIR__ . '/auth.php';
iniciar_sessao();
exigir_login();
exigir_post();
exigir_csrf();

$pdo = conectar();
$tarefa = texto_obrigatorio('tarefa');
$responsavel = texto_obrigatorio('responsavel');
$inicio = data_obrigatoria('inicio');
$prazo = data_obrigatoria('prazo');
$stmt = $pdo->prepare('INSERT INTO cronograma (tarefa,responsavel,inicio,prazo) VALUES (?,?,?,?)');
$ok = $stmt->execute([$tarefa, $responsavel, $inicio, $prazo]);
json_resposta(['sucesso' => $ok, 'id' => (int)$pdo->lastInsertId()]);
