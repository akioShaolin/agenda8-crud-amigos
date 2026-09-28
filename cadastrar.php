<?php

session_start();

if (!isset($_SESSION["usuario"])) {
    header("Location: login.php");
    exit;
}

require "conexao.php";

$mensagem = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $nome = trim($_POST["nome"]);
    $telefone = trim($_POST["telefone"]);
    $email = trim($_POST["email"]);

    $sql = "
        INSERT INTO amigos (nome, telefone, email)
        VALUES (?, ?, ?)
    ";

    $stmt = $conexao->prepare($sql);

    $stmt->bind_param(
        "sss",
        $nome,
        $telefone,
        $email
    );

    if ($stmt->execute()) {

        $mensagem = "Amigo cadastrado com sucesso!";

    } else {

        $mensagem = "Erro ao cadastrar o amigo.";

    }

    $stmt->close();
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Cadastrar amigo</title>

    <link rel="stylesheet" href="style.css">
</head>

<body>

<div class="container container-pequeno">

    <h1>Cadastrar amigo</h1>

    <?php if ($mensagem != ""): ?>

        <div class="mensagem sucesso">
            <?= htmlspecialchars($mensagem) ?>
        </div>

    <?php endif; ?>

    <form method="post">

        <div class="grupo-form">

            <label for="nome">Nome:</label>

            <input
                type="text"
                id="nome"
                name="nome"
                required
            >

        </div>

        <div class="grupo-form">

            <label for="telefone">Telefone:</label>

            <input
                type="text"
                id="telefone"
                name="telefone"
            >

        </div>

        <div class="grupo-form">

            <label for="email">E-mail:</label>

            <input
                type="email"
                id="email"
                name="email"
            >

        </div>

        <button type="submit">
            Cadastrar
        </button>

        <a href="index.php" class="botao botao-secundario">
            Voltar
        </a>

    </form>

</div>

</body>

</html>