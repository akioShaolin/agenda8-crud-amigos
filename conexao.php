<?php
$servidor = "localhost";
$usuario = "root";
$senha = "sua_senha"; // Adicione aqui a sua senha
$banco = "gabi_crud";

$conexao = new mysqli($servidor, $usuario, $senha, $banco);

if ($conexao->connect_error) {
    die("Erro na conexão com o banco de dados: " . $conexao->connect_error);
}

$conexao->set_charset("utf8mb4");

?>