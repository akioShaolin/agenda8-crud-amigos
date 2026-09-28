<?php

require "conexao.php";

$usuario = "gabi_hash";
$senha = "1234";

$senhaHash = password_hash($senha, PASSWORD_DEFAULT);

$sql = "INSERT INTO usuarios (usuario, senha) VALUES (?, ?)";

$stmt = $conexao->prepare($sql);
$stmt->bind_param("ss", $usuario, $senhaHash);

if ($stmt->execute()) {
    echo "Usuário criado com sucesso.";
} else {
    echo "Erro ao criar usuário: " . $stmt->error;
}

$stmt->close();
$conexao->close();
?>