<?php
require('verifica.php');
if (isset($_SESSION["nome_usuario"])) {
    // Transforma a primeira letra do nome em maiúscula
    $nomeUsuario = ucfirst(strtolower($_SESSION["nome_usuario"]));

    // Exibe a mensagem de boas-vindas com o nome do usuário formatado
    echo "<h1>Bem-vindo " . $nomeUsuario . "!</h1>";
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="menu.css">
    <title>Menu</title>
</head>

<body>
    <section class="page1">
        <div class="acoes">
            <div class="botao">
                <a href="cadastro.php">Cadastrar</a>
            </div>
            <div class="botao">
                <?php
                if ($_SESSION['nivel_usuario'] == 'ADM') {
                    echo '<a href="relatorio.php">Relatório</a> <br>';
                }
                ?>
            </div>
            <div class="botao">
                <a href="logout.php">Sair</a>
            </div>


        </div>
    </section>

</body>

</html>