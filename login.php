<?php
include('config.php');
session_start();

if (@$_REQUEST['botao']) {

    $login = $_POST["login"];
    $senha = $_POST["senha"];

    $query_consultar = "SELECT * FROM usuario WHERE login = '$login' AND senha = '$senha';";
    $result_consultar = mysqli_query($con, $query_consultar);

    while ($coluna = mysqli_fetch_array($result_consultar)) {
        $_SESSION["id_usuario"] = $coluna["id"];
        $_SESSION["nome_usuario"] = $coluna["login"];
        $_SESSION["nivel_usuario"] = $coluna["nivel"];

        $niv = $coluna['nivel'];
        if ($niv == "USER" || $niv == "ADM") {
            header("Location: menu.php");
            exit;
        } 
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Login</title>
</head>

<body>
    <section class="vh-100">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col col-xl-10">
                    <div class="card" style="border-radius: 1rem;">
                        <div class="row g-0">
                            <div class="col-md-6 col-lg-5 d-none d-md-block">
                                <img src="imgs/a.jpg" alt="Pangaré" class="img-fluid" style="border-radius: 1rem 0 0 1rem;" />
                            </div>
                            <div class="col-md-6 col-lg-7 d-flex align-items-center">
                                <div class="card-body p-4 p-lg-5 text-black">

                                    <form action="#" method="post" class="justify-content-center">

                                        <div class="form-outline mb-4">
                                            <label class="form-label" for="login">Login</label>
                                            <input type="text" id="login" name="login" class="form-control form-control-lg" />
                                        </div>

                                        <div class="form-outline mb-4">
                                            <label class="form-label" for="senha">Senha</label>
                                            <input type="password" id="senha" name="senha" class="form-control form-control-lg" />
                                        </div>

                                        <div class="mb-4 d-flex ">
                                            <input type="submit" name="botao" value="Login" style="background-color: #CFB29F; margin-left: 25%;" class="btn btn-lg"></input>
                                            <button type="button" style="background-color: #F9E5D7; margin-left: 60px;" class="btn btn-lg pl-2">
                                                <a href="cadastro.php" style="color: inherit; text-decoration: none;">Cadastrar</a>
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>




</html>