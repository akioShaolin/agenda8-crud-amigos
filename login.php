<?php

session_start();

require "conexao.php";

$mensagem = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $usuario = trim($_POST["usuario"]);
    $senha = $_POST["senha"];

    $sql = "SELECT id, usuario, senha FROM usuarios WHERE usuario = ?";

    $stmt = $conexao->prepare($sql);
    $stmt->bind_param("s", $usuario);
    $stmt->execute();

    $resultado = $stmt->get_result();

    if ($resultado->num_rows == 1) {

        $dados = $resultado->fetch_assoc();

        if (password_verify($senha, $dados["senha"])) {

            session_regenerate_id(true);

            $_SESSION["usuario_id"] = $dados["id"];
            $_SESSION["usuario"] = $dados["usuario"];

            header("Location: index.php");
            exit;

        } else {
            $mensagem = "Usuário ou senha incorretos.";
        }

    } else {
        $mensagem = "Usuário ou senha incorretos.";
    }

    $stmt->close();
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Login - Amigos da Gabi</title>

    <link rel="stylesheet" href="style.css">
</head>

<body>

<div class="container container-pequeno">

    <h1>Amigos da Gabi</h1>

    <p>Entre no sistema para acessar o cadastro de amigos.</p>

    <?php if ($mensagem != ""): ?>

        <div class="mensagem erro">
            <?= htmlspecialchars($mensagem) ?>
        </div>

    <?php endif; ?>

    <form method="post">

        <div class="grupo-form">
            <label for="usuario">Usuário:</label>

            <input
                type="text"
                id="usuario"
                name="usuario"
                required
            >
        </div>

        <div class="grupo-form">
            <label for="senha">Senha:</label>

            <input
                type="password"
                id="senha"
                name="senha"
                required
            >
        </div>

        <button type="submit">Entrar</button>

    </form>

</div>

</body>

</html>