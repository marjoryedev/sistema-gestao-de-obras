# 🔨 Sistema de Gestão de Obras

Sistema web desenvolvido para auxiliar no **gerenciamento e organização de informações relacionadas a obras**, centralizando diferentes áreas da gestão em uma única aplicação.

O projeto foi desenvolvido como prática de desenvolvimento web, envolvendo **PHP, MySQL, autenticação de usuários e operações CRUD**.

## ✨ Funcionalidades

* 🔐 Sistema de login e autenticação
* 👷 Cadastro e gerenciamento de funcionários
* 🧱 Cadastro e gerenciamento de materiais
* 🚜 Cadastro e gerenciamento de equipamentos
* 📦 Cadastro e gerenciamento de fornecedores
* 💰 Controle de custos
* 📅 Gerenciamento de cronogramas
* 🔒 Controle de sessão e acesso às páginas
* 🗃️ Integração com banco de dados MySQL

## 🛠️ Tecnologias utilizadas

* **PHP** — lógica e processamento da aplicação
* **MySQL** — armazenamento e gerenciamento dos dados
* **HTML** — estrutura das páginas
* **CSS** — estilização e interface
* **Apache** — servidor web
* **XAMPP** — ambiente de desenvolvimento local

## 📂 Estrutura do projeto

O sistema é dividido em diferentes arquivos PHP responsáveis pelas funcionalidades da aplicação, incluindo:

* Autenticação e controle de sessão
* Cadastro, edição, listagem e exclusão de registros
* Gerenciamento de funcionários, materiais, equipamentos e fornecedores
* Controle de custos
* Gerenciamento de cronogramas
* Configuração e integração com o banco de dados

## 🗄️ Banco de dados

O arquivo `database.sql` contém a estrutura necessária para criação do banco de dados utilizado pelo sistema.

Para configurar o projeto localmente:

1. Crie um banco de dados MySQL.
2. Importe o arquivo `database.sql`.
3. Copie `db_config.example.php` para um arquivo de configuração próprio.
4. Informe as credenciais do seu banco de dados.
5. Execute o projeto utilizando um servidor PHP/Apache.

> 🔐 Dados de acesso ao banco de dados não devem ser enviados para o repositório público.

## 🚧 Status do projeto

**Em desenvolvimento.**

O projeto continua sendo aprimorado como parte da minha formação e prática em desenvolvimento web.

## 🎯 Objetivo

Este projeto foi desenvolvido com o objetivo de praticar conceitos de **desenvolvimento web, PHP, bancos de dados, autenticação, CRUD e organização de sistemas**, além de fazer parte do meu portfólio profissional.

---

💻 Desenvolvido por **Marjorye**
🔗 [GitHub](https://github.com/marjoryedev)

## GitHub
Não publique `db_config.php` com credenciais reais. Use `db_config.example.php` como modelo e mantenha `db_config.php` no `.gitignore`.

## Projeto de portfólio
Este sistema foi desenvolvido como projeto demonstrativo de aplicação web com autenticação, banco de dados e operações CRUD.
