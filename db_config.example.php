<?php
// Copie este arquivo para db_config.php e preencha os dados do seu banco.
// NÃO publique credenciais reais no GitHub.

if (!defined('DB_HOST')) define('DB_HOST', 'SEU_HOST_MYSQL');
if (!defined('DB_USER')) define('DB_USER', 'SEU_USUARIO_MYSQL');
if (!defined('DB_PASS')) define('DB_PASS', 'SUA_SENHA_MYSQL');
if (!defined('DB_NAME')) define('DB_NAME', 'SEU_BANCO_MYSQL');

function conectar(): PDO {
    try {
        $pdo = new PDO(
            'mysql:host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=utf8mb4',
            DB_USER,
            DB_PASS,
            [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                PDO::ATTR_EMULATE_PREPARES => false,
            ]
        );
        return $pdo;
    } catch (PDOException $e) {
        error_log('Erro de conexão com o banco: ' . $e->getMessage());
        http_response_code(500);
        die(json_encode(['erro' => 'Não foi possível conectar ao banco de dados.']));
    }
}
