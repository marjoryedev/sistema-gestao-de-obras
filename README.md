# Sistema de Gestão de Obras

Projeto web de portfólio para gerenciamento de custos, funcionários, materiais, equipamentos, cronograma e fornecedores.

## Tecnologias
- PHP 7.4+
- MySQL/MariaDB
- PDO
- HTML5
- CSS3
- JavaScript

## Segurança aplicada
- PDO com prepared statements
- Senhas com `password_hash()` / `password_verify()`
- Regeneração do ID da sessão após login
- Cookies de sessão com HttpOnly e SameSite
- Proteção CSRF para operações POST
- Verificação de autenticação em todos os endpoints
- Validação de tipos, datas, números e tamanhos
- Saída de dados com `textContent` no front-end para reduzir risco de XSS
- Credenciais de banco fora do repositório público
- Mensagens de erro sem exposição de detalhes internos do banco

## Instalação
1. Crie um banco MySQL.
2. Importe `database.sql` no phpMyAdmin.
3. Preencha `db_config.php` com as credenciais do banco.
4. Crie um usuário na tabela `usuarios`. A coluna `senha` deve receber um hash gerado por `password_hash('SUA_SENHA', PASSWORD_DEFAULT)`.
5. Faça upload dos arquivos para a hospedagem.

## GitHub
Não publique `db_config.php` com credenciais reais. Use `db_config.example.php` como modelo e mantenha `db_config.php` no `.gitignore`.

## Projeto de portfólio
Este sistema foi desenvolvido como projeto demonstrativo de aplicação web com autenticação, banco de dados e operações CRUD.
