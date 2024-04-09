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
                    <label for="exampleInputEmail1" class="form-label">Login</label>
                    <input type="text" name="login" class="form-control" value="<?php echo $row->login; ?>">
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Senha</label>
                    <input type="password" name="senha" class="form-control" value="<?php echo $row->md5('senha'); ?>">
                    <div id="passwordHelp" class="form-text">Sua senha nunca será compartilhada com outros.</div>
                </div>
                <input type="submit" name="botao" value="Cadastrar" class="btn btn-primary"></input>
                <a href="login.php" value="Cadastrar" class="btn btn-primary">Fazer Login</a>
            </form>
        </div>
    </section> 
</body>


</html>