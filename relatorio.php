<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Relatório</title>
</head>

<body>

    <?php
    include('config.php');
    #VERIFICAÇÃO PADRÃO PARA VER SE USUARIO É ADM
    session_start();
    if (!isset($_SESSION['id_usuario']) || $_SESSION['nivel_usuario'] !== 'ADM') {
        header("Location: login.php");
        exit;
    }
    ?>
    <div class="container mt-5 text-center">
        <section class="vh-100">
            <div class="card text-center">
                <div class="card-header">
                    <h1>Usuarios</h1>
                </div>
                <div class="card-body d-block">
                    <a href="menu.php" class="btn btn-primary">Menu</a>
                    <a href="logout.php" class="btn btn-primary">Logout <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-box-arrow-right" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M10 12.5a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v2a.5.5 0 0 0 1 0v-2A1.5 1.5 0 0 0 9.5 2h-8A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-2a.5.5 0 0 0-1 0z" />
                            <path fill-rule="evenodd" d="M15.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 0 0-.708.708L14.293 7.5H5.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708z" />
                        </svg></a>
                </div>
            </div>
            <?php
            @require('verifica.php');
            $query = "SELECT * FROM usuario";
            $result = $con->query($query);
            $qtd = $result->num_rows;

            if ($qtd > 0) {
            ?>
                <table class="table table-hover table-striped">
                    <tr>
                        <th>#</th>
                        <th>Login</th>
                        <th>Senha</th>
                        <th>Nivel</th>
                        <th>Ações</th>
                    </tr>
                    <?php
                    while ($row = $result->fetch_object()) {
                    ?>
                        <tr>
                            <td><?php echo $row->id; ?></td>
                            <td><?php echo $row->login; ?></td>
                            <td><?php echo $row->senha; ?></td>
                            <td><?php echo $row->nivel; ?></td>
                            <td>
                                <a href='editar.php?id=<?php echo $row->id; ?>'" class=" btn btn-primary btn-sm">Editar</a>
                                <button onclick="if(confirm('Tem certeza que deseja excluir?')) { location.href='?excluir&id=<?php echo $row->id; ?>'; }" class="btn btn-danger btn-sm">Excluir</button>
                            </td>
                        </tr>
                    <?php
                    }
                    ?>
                </table>
            <?php
            } else {
                echo "<p class='alert alert-danger'>Sem resultados!</p>";
            }
            ?>
        </section>
        <?php
        if (isset($_REQUEST['excluir'])) {
            $query = "DELETE FROM usuario WHERE id=" . $_REQUEST['id'];

            $result = $con->query($query);

            if ($result) {
                echo "<script>alert('Excluído com sucesso!'); location.href='?page=listar';</script>";
            } else {
                echo "<script>alert('Erro ao excluir!'); location.href='?page=listar';</script>";
            }
        }
        ?>
    </div>
</body>

</html>