# 🏗️ Sistema de Gestão de Obras

Sistema web desenvolvido para auxiliar no gerenciamento e organização de informações relacionadas a obras.

O projeto permite controlar diferentes áreas da obra em um único sistema, facilitando o acompanhamento de funcionários, materiais, equipamentos, fornecedores, custos e cronograma.

## 🌐 Projeto online

🔗 **[Acessar o sistema](https://sistema-gestao-de-obras.infinityfree.me)**

> Para demonstração, utilize as credenciais de acesso disponibilizadas no projeto.

---

## ✨ Funcionalidades

- 🔐 Sistema de login e autenticação
- 👷 Cadastro, edição, consulta e exclusão de funcionários
- 🧱 Gerenciamento de materiais
- 🚜 Gerenciamento de equipamentos
- 🤝 Cadastro e gerenciamento de fornecedores
- 💰 Controle de custos
- 📅 Gerenciamento de cronograma
- 🔒 Controle de sessão
- 🛡️ Proteções de segurança para operações do sistema
- 📊 Organização centralizada das informações da obra

---

## 🛠️ Tecnologias utilizadas

### Back-end
- PHP
- PDO
- MySQL

### Front-end
- HTML5
- CSS3
- JavaScript

### Banco de dados
- MySQL / MariaDB

### Hospedagem
- InfinityFree

---

## 🔐 Segurança

O projeto conta com algumas práticas de segurança aplicadas ao desenvolvimento:

- Utilização de **PDO com prepared statements**
- Senhas armazenadas utilizando `password_hash()`
- Verificação de senhas com `password_verify()`
- Regeneração do ID da sessão após autenticação
- Cookies de sessão com `HttpOnly`
- Proteção contra CSRF em operações POST
- Validação de dados recebidos pelo sistema
- Verificação de autenticação nos endpoints
- Controle de sessão para acesso às funcionalidades

---

## 🗂️ Estrutura do projeto

O sistema é organizado em diferentes arquivos PHP responsáveis pelas funcionalidades de autenticação, gerenciamento de dados e comunicação com o banco de dados.

```text
sistema-gestao-de-obras/
│
├── auth.php
├── login.php
├── logout.php
├── processar_login.php
├── verificar_sessao.php
│
├── index.php
│
├── server_funcionarios.php
├── listar_funcionarios.php
├── editar_funcionarios.php
├── deletar_funcionarios.php
│
├── server_materiais.php
├── listar_materiais.php
├── editar_materiais.php
├── deletar_materiais.php
│
├── server_equipamentos.php
├── listar_equipamentos.php
├── editar_equipamentos.php
├── deletar_equipamentos.php
│
├── server_fornecedores.php
├── listar_fornecedores.php
├── editar_fornecedores.php
├── deletar_fornecedores.php
│
├── server_custos.php
├── listar_custos.php
├── editar_custos.php
├── deletar_custos.php
│
├── server_cronograma.php
├── listar_cronograma.php
├── editar_cronograma.php
├── deletar_cronograma.php
│
├── style.css
├── database.sql
├── db_config.example.php
├── .htaccess
└── README.md
