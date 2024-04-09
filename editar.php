<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="cadastro.css">
    <title>Cadastro Usuario</title>
</head>

<body>
    <script src="main.js"></script>
    <?php
    include('config.php');

    #VERIFICAÇÃO PADRÃO PARA VER SE USUARIO É ADM
    session_start();
    if (!isset($_SESSION['id_usuario']) || $_SESSION['nivel_usuario'] !== 'ADM') {
        header("Location: login.php");
        exit;
    }

    $query = "SELECT * FROM usuario WHERE id =" . $_REQUEST['id'];

    $result = $con->query($query);
    $row = $result->fetch_object();
    ?>
    <section class="page1">
        <div class="form">
            <form action="#" method="post">
                <div class="mb-3">
                    <h1 style="text-align: center; font-weight: 700; margin-top: 20px;">Editar</h1>
                    <img src="imgs/360_F_561584417_2mWFiThqNVkc869p5CJcsZwMaf4PdVvv.jpg" class="img-fluid" alt="..." style="border-radius: 20px; margin-top: 40px;">
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Novo Login</label>
                    <input type="text" name="login" class="form-control" value="" placeholder="<?php echo $row->login; ?>">
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Nova Senha</label>
                    <input type="text" name="senha" class="form-control" value="" placeholder="<?php echo $row->senha; ?>">
                    <div id="passwordHelp" class="form-text">Sua senha nunca será compartilhada com outros.</div>
                </div>
                <input type="submit" name="botao" value="Editar" class="btn btn-primary"></input> <br>
                <a href="relatorio.php" style="margin-top: 20px; text-align:center;" value="Cadastrar" class="">Voltar para relatorio</a>
            </form>
        </div>
    </section>
    <?php
    if (isset($_REQUEST['botao'])) {
        $query_editar = "UPDATE usuario SET";

        if (!empty($_POST['login'])) {
            $login = $_POST['login'];
            $query_editar .= " login = '$login',";
        }

        if (!empty($_POST['senha'])) {
            $senha = $_POST['senha'];
            $senha = md5($senha);
            $query_editar .= " senha = '$senha',";
        }

        $query_editar = rtrim($query_editar, ',');
        $query_editar .= " WHERE id = " . $_REQUEST['id'];
        $result_editar = mysqli_query($con, $query_editar);
    }
    ?>
</body>


</html>