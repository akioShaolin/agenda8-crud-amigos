<?php

session_start();

if (!isset($_SESSION["usuario"])) {
    header("Location: login.php");
    exit;
}

require "conexao.php";

$id = $_GET["id"] ?? 0;

$sql = "DELETE FROM amigos WHERE id = ?";

$stmt = $conexao->prepare($sql);

$stmt->bind_param("i", $id);

$stmt->execute();

$stmt->close();

header("Location: index.php");
exit;
?>