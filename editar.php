<?php

session_start();

if (!isset($_SESSION["usuario"])) {
    header("Location: login.php");
    exit;
}

require "conexao.php";

$id = $_GET["id"] ?? 0;

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $id = $_POST["id"];
    $nome = trim($_POST["nome"]);
    $telefone = trim($_POST["telefone"]);
    $email = trim($_POST["email"]);

    $sql = "
        UPDATE amigos
        SET nome = ?, telefone = ?, email = ?
        WHERE id = ?
    ";

    $stmt = $conexao->prepare($sql);

    $stmt->bind_param(
        "sssi",
        $nome,
        $telefone,
        $email,
        $id
    );

    $stmt->execute();

    $stmt->close();

    header("Location: index.php");
    exit;
}

$sql = "
    SELECT id, nome, telefone, email
    FROM amigos
    WHERE id = ?
";

$stmt = $conexao->prepare($sql);

$stmt->bind_param("i", $id);

$stmt->execute();

$resultado = $stmt->get_result();

$amigo = $resultado->fetch_assoc();

if (!$amigo) {
    die("Amigo não encontrado.");
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Editar amigo</title>

    <link rel="stylesheet" href="style.css">
</head>

<body>

<div class="container container-pequeno">

    <h1>Editar amigo</h1>

    <form method="post">

        <input
            type="hidden"
            name="id"
            value="<?= htmlspecialchars($amigo["id"]) ?>"
        >

        <div class="grupo-form">

            <label for="nome">Nome:</label>

            <input
                type="text"
                id="nome"
                name="nome"
                value="<?= htmlspecialchars($amigo["nome"]) ?>"
                required
            >

        </div>

        <div class="grupo-form">

            <label for="telefone">Telefone:</label>

            <input
                type="text"
                id="telefone"
                name="telefone"
                value="<?= htmlspecialchars($amigo["telefone"]) ?>"
            >

        </div>

        <div class="grupo-form">

            <label for="email">E-mail:</label>

            <input
                type="email"
                id="email"
                name="email"
                value="<?= htmlspecialchars($amigo["email"]) ?>"
            >

        </div>

        <button type="submit">
            Salvar alterações
        </button>

        <a href="index.php" class="botao botao-secundario">
            Voltar
        </a>

    </form>

</div>

</body>

</html>