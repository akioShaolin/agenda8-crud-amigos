<?php
$servidor = "localhost";
$usuario = "root";
$senha = "sua_senha"; // Adicione aqui a sua senha
$banco = "gabi_crud";

$conexao = new mysqli($servidor, $usuario, $senha, $banco);

if ($conexao->connect_error) {
    die("Erro na conexão: " . $conexao->connect_error);
}
?>