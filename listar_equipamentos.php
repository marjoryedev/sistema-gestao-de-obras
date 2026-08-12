<?php
require_once __DIR__ . '/auth.php';
iniciar_sessao();
exigir_login();

$pdo = conectar();
$stmt = $pdo->query('SELECT * FROM equipamentos ORDER BY criado_em DESC');
json_resposta(['dados' => $stmt->fetchAll()]);
