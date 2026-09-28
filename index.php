<?php

session_start();

if (!isset($_SESSION["usuario"])) {
    header("Location: login.php");
    exit;
}

require "conexao.php";

$sql = "SELECT id, nome, telefone, email FROM amigos ORDER BY nome";

$resultado = $conexao->query($sql);
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Amigos da Gabi</title>

    <link rel="stylesheet" href="style.css">
</head>

<body>

<div class="container">

    <div class="topo">

        <div>
            <h1>Amigos cadastrados</h1>

            <span class="usuario">
                Usuário logado:
                <strong>
                    <?= htmlspecialchars($_SESSION["usuario"]) ?>
                </strong>
            </span>
        </div>

        <a href="logout.php" class="botao botao-sair">
            Sair
        </a>

    </div>

    <a href="cadastrar.php" class="botao">
        Cadastrar novo amigo
    </a>

    <table>

        <thead>

            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Telefone</th>
                <th>E-mail</th>
                <th>Ações</th>
            </tr>

        </thead>

        <tbody>

        <?php while ($amigo = $resultado->fetch_assoc()): ?>

            <tr>

                <td>
                    <?= htmlspecialchars($amigo["id"]) ?>
                </td>

                <td>
                    <?= htmlspecialchars($amigo["nome"]) ?>
                </td>

                <td>
                    <?= htmlspecialchars($amigo["telefone"]) ?>
                </td>

                <td>
                    <?= htmlspecialchars($amigo["email"]) ?>
                </td>

                <td>

                    <div class="acoes">

                        <a
                            class="botao botao-editar"
                            href="editar.php?id=<?= $amigo["id"] ?>"
                        >
                            Editar
                        </a>

                        <a
                            class="botao botao-excluir"
                            href="excluir.php?id=<?= $amigo["id"] ?>"
                            onclick="return confirm('Deseja realmente excluir este amigo?')"
                        >
                            Excluir
                        </a>

                    </div>

                </td>

            </tr>

        <?php endwhile; ?>

        </tbody>

    </table>

</div>

</body>

</html>