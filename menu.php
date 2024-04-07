<?php
require('verifica.php');
echo "Logado como: " . $_SESSION["nome_usuario"];
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Menu</title>
</head>

<body>
    <br>
    <a href="cadastro.php">Cadastrar</a>
    <?php
    if($_SESSION['nivel_usuario'] == 'ADM') {
        echo '<br> <a href="relatorio.php">Relatório</a>';
    }
    ?>
    <br>
    <a href="logout.php">Sair</a>
</body>

</html>