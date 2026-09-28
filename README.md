# Agenda 8 - CRUD de Amigos

Projeto desenvolvido para a atividade da **Agenda 8 de Desenvolvimento de Sistemas II**.

O objetivo da atividade foi desenvolver e apresentar um sistema simples de cadastro de amigos utilizando **PHP e MySQL**, aplicando as quatro operações básicas de um CRUD e um sistema de autenticação por login.

## Funcionalidades

O sistema permite:

- Realizar login
- Visualizar os amigos cadastrados
- Cadastrar novos amigos
- Editar amigos existentes
- Excluir registros
- Encerrar a sessão através do logout

## O que é CRUD?

CRUD representa as quatro operações básicas realizadas sobre registros de um banco de dados:

| Operação | Significado | Implementação no projeto |
|---|---|---|
| Create | Criar | Cadastro de um novo amigo |
| Read | Ler | Listagem dos amigos cadastrados |
| Update | Atualizar | Edição dos dados de um amigo |
| Delete | Excluir | Exclusão de um amigo |

## Tecnologias utilizadas

- PHP
- MySQL
- HTML
- CSS
- SQL
- Git
- GitHub
- MySQL Workbench

## Estrutura do projeto

```text
agenda8-crud-amigos/
├── README.md
├── banco.sql
├── conexao.php
├── login.php
├── logout.php
├── index.php
├── cadastrar.php
├── editar.php
├── excluir.php
├── style.css
└── prints/
```

## Banco de dados

O projeto utiliza o banco:

```sql
gabi_crud
```

São utilizadas duas tabelas principais:

### amigos

Armazena os registros utilizados pelo CRUD:

```text
id
nome
telefone
email
```

### usuarios

Armazena os dados utilizados para autenticação:

```text
id
usuario
senha
```

A senha não é armazenada diretamente no banco de dados. É utilizado um hash gerado pelo PHP através de:

```php
password_hash()
```

Durante o login, a senha digitada é verificada utilizando:

```php
password_verify()
```

## Segurança das consultas

As operações que utilizam dados fornecidos pelo usuário utilizam **Prepared Statements**.

Exemplo:

```php
$sql = "DELETE FROM amigos WHERE id = ?";

$stmt = $conexao->prepare($sql);

$stmt->bind_param("i", $id);

$stmt->execute();
```

O uso de `prepare()` e `bind_param()` ajuda a evitar vulnerabilidades de **SQL Injection**, pois os valores enviados pelo usuário são tratados separadamente do comando SQL.

Os dados exibidos nas páginas também são tratados com:

```php
htmlspecialchars()
```

Essa função evita que conteúdos digitados pelo usuário sejam interpretados pelo navegador como HTML ou JavaScript.

## Login e sessão

Após realizar o login corretamente, o PHP cria uma sessão:

```php
$_SESSION["usuario"]
```

As páginas do CRUD verificam se essa sessão existe antes de liberar o acesso.

Caso o usuário tente acessar o sistema sem autenticação, ele é redirecionado para a página de login.

O logout encerra a sessão e retorna o usuário para a tela inicial.

## Funcionamento do sistema

O fluxo principal da aplicação é:

```text
Login
  ↓
Autenticação
  ↓
Lista de amigos
  ↓
CRUD
  ├── Cadastrar
  ├── Visualizar
  ├── Editar
  └── Excluir
  ↓
Logout
```

## Testes realizados

Durante o desenvolvimento foram realizados testes de:

- Conexão do PHP com o MySQL
- Criação do banco de dados
- Cadastro de registros
- Leitura dos registros
- Alteração de dados
- Exclusão de registros
- Prepared Statements
- Login
- Validação da senha
- Controle de sessão
- Logout

## Execução

Primeiramente, execute o arquivo:

```text
banco.sql
```

no MySQL.

Depois, configure os dados de conexão em:

```text
conexao.php
```

Exemplo:

```php
$servidor = "localhost";
$usuario = "root";
$senha = "sua_senha";
$banco = "gabi_crud";
```

> A senha utilizada no ambiente de desenvolvimento não é armazenada neste repositório.

Inicie o servidor PHP na pasta do projeto:

```powershell
php -S localhost:8000
```

Depois acesse:

```text
http://localhost:8000/login.php
```

## Registros do desenvolvimento

Durante a atividade foram registrados prints demonstrando:

1. Criação do banco de dados
2. Conexão entre PHP e MySQL
3. Formulário de cadastro
4. Registro salvo no MySQL
5. Listagem dos amigos
6. Edição de um registro
7. Resultado da edição
8. Cadastro de um registro para teste
9. Visualização do novo registro
10. Confirmação de exclusão
11. Resultado após exclusão

Esses registros estão disponíveis na pasta:

```text
prints/
```

## Aprendizados

Durante este projeto foi possível praticar a integração entre PHP e MySQL e compreender melhor como uma aplicação web pode criar, consultar, editar e excluir registros de um banco de dados.

Também foram aplicados conceitos de segurança apresentados durante as atividades, principalmente o uso de **Prepared Statements**, `htmlspecialchars()`, hash de senhas e sessões PHP.

O desenvolvimento ajudou a entender que o PHP funciona como intermediário entre a interface utilizada pelo usuário e o banco de dados MySQL.

## Autor

Pedro Akio Sakuma