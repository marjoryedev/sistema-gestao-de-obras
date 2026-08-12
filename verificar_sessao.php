<?php
require_once __DIR__ . '/auth.php';
iniciar_sessao();
json_resposta([
    'logado' => !empty($_SESSION['usuario_id']),
    'usuario' => $_SESSION['usuario'] ?? null,
    'nivel' => $_SESSION['nivel'] ?? null,
]);
