# Agenda 8 - CRUD de Amigos

Projeto desenvolvido para a atividade da Agenda 8 de Desenvolvimento de Sistemas II.

O objetivo é criar um sistema de cadastro de amigos utilizando PHP e MySQL, aplicando as operações de CRUD e também um sistema de login.

## Funcionalidades previstas

O sistema deverá permitir:

- Cadastrar amigos
- Visualizar os amigos cadastrados
- Editar os dados de um amigo
- Excluir um amigo
- Realizar login no sistema
- Utilizar consultas seguras com Prepared Statements

## Estrutura do projeto

```text
agenda8-crud-amigos/
├── README.md
├── banco.sql
├── conexao.php
├── login.php
├── index.php
├── cadastrar.php
├── editar.php
├── excluir.php
└── prints/
```

## Banco de dados

O banco de dados será utilizado para armazenar os dados dos amigos cadastrados e as informações necessárias para o sistema de login.

O arquivo `banco.sql` será responsável pela criação das tabelas utilizadas no projeto.

## Tecnologias utilizadas

- PHP
- MySQL
- HTML
- CSS
- Git
- GitHub

## Segurança

As consultas SQL que recebem dados digitados pelo usuário serão feitas utilizando Prepared Statements com `prepare()` e `bind_param()`, reduzindo o risco de SQL Injection.

Os dados exibidos na página também poderão ser tratados com `htmlspecialchars()` para evitar que textos digitados pelo usuário sejam interpretados como código HTML ou JavaScript.

## Status do projeto

Projeto em desenvolvimento.

Atualmente, a estrutura inicial dos arquivos já foi criada.

As próximas etapas serão:

1. Criar e testar o banco de dados
2. Configurar a conexão PHP com o MySQL
3. Implementar o cadastro de amigos
4. Implementar a listagem dos registros
5. Implementar edição e exclusão
6. Implementar o sistema de login
7. Realizar testes
8. Registrar prints do funcionamento
9. Preparar a apresentação final

## Autor

Pedro Akio Sakuma