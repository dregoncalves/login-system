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
    <section class="page1">
        <div class="form">
            <form action="#" method="post">
                <div class="mb-3">
                    <h1 style="text-align: center; font-weight: 700; margin-top: 20px;">Cadastrar</h1>
                    <img src="imgs/360_F_561584417_2mWFiThqNVkc869p5CJcsZwMaf4PdVvv.jpg" class="img-fluid" alt="..." style="border-radius: 20px; margin-top: 40px;">
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Login</label>
                    <input type="text" name="login" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Senha</label>
                    <input type="password" name="senha" class="form-control" id="exampleInputPassword1">
                    <div id="passwordHelp" class="form-text">Sua senha nunca será compartilhada com outros.</div>
                </div>
                <input type="submit" name="botao" value="Cadastrar" class="btn btn-primary"></input>
            </form>
        </div>
    </section>
    <?php
    include('config.php');

    if (@$_REQUEST['botao']) {
        $login = $_POST['login'];
        $senha = $_POST['senha'];

        $query_check = "SELECT * FROM usuario WHERE login = '$login'";
        $result_check = mysqli_query($con, $query_check);
        if (mysqli_num_rows($result_check) > 0) {
            echo "<script>usuarioJaExiste();</script>";
        } else {
            $query = "INSERT INTO usuario (login, senha) VALUES ('$login', '$senha')";
            $result = mysqli_query($con, $query);

            if (!$result) {
                echo "<script>falhaCadastro();</script>";
            } else {
                echo "<script>sucessoCadastro();</script>";
            }
        }
    }


    ?>
</body>

</html>