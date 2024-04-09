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
    $query = "SELECT * FROM usuario WHERE id =" . $_REQUEST['id'] . ";";

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
                    <label for="exampleInputEmail1" class="form-label">Login</label>
                    <input type="text" name="login" class="form-control" value="<?php echo $row->login; ?>">
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Senha</label>
                    <input type="password" name="senha" class="form-control" value="<?php echo $row->senha; ?>">
                    <div id="passwordHelp" class="form-text">Sua senha nunca será compartilhada com outros.</div>
                </div>
                <div class="mb-3">
                    <select class="form-control" id="exampleFormControlSelect1">
                        <option selected>Nível</option>
                        <option>ADM</option>
                        <option>USER</option>
                    </select>
                </div>
                <div class="text-center">
                    <input type="submit" name="botao" value="Editar" class="btn btn-primary"></input>
                    <a href="relatorio.php" value="Cadastrar" class="btn btn-primary">Cancelar</a>
                </div>
            </form>
        </div>
    </section>
</body>
<?php
if (isset($_REQUEST['botao'])) {
    $login = $_POST['login'];
    $senha = $_POST['senha'];
    $nivel = $_POST['nivel'];

    $query = "UPDATE usuario SET login='{$login}', senha='{$senha}', nivel='{$nivel}' WHERE id =" . $_REQUEST['id'];

    $result = $con->query($query);

    if ($result) {
        echo "<script>alert('Editado com sucesso!');</script>";
        echo "<script>location.href='relatorio.php';</script>";
    } else {
        echo "<script>alert('Erro ao editar !');</script>";
        echo "<script>location.href='relatorio.php';</script>";
    }
}
?>

</html>