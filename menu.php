<?php
require('verifica.php');
echo "Logado como: " . $_SESSION["nome_usuario"];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu</title>
</head>

<body>
    <br>
    <a href="cadastro.php">Cadastrar</a> <br>
    <a href="relatorio.php">Relatorio</a>
    <br>
    <a href="logout.php">Sair</a>
</body>

</html>