<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Loja de Sapatos</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .navbar {
            margin-bottom: 20px;
        }
        .card-img-top {
            height: 200px;
            object-fit: cover;
        }
        .card {
            margin-bottom: 20px;
        }
        .card-title {
            font-size: 1.25rem;
        }
        .card-text {
            font-size: 1rem;
            color: #555;
        }
        .card-footer {
            background-color: #fff;
            border-top: 0;
        }
    </style>
</head>
<body>

<?php
        include "topo.php";
    ?>  

<div class="container">
    <h1 class="my-4 text-center">Bem-vindo ao nosso site de informações sobre Sapatos</h1>
    <div class="row">
        <div class="col-md-4"></div>
        <div class="col-md-5 m-2 p-3">
            <h1>Cadastro de clientes</h1>
            <?php
            session_start();
            if (isset($_SESSION['mensagem'])) {
                echo '<div class="alert alert-success" role="alert">';
                echo $_SESSION['mensagem'];
                echo '</div>';
                unset($_SESSION['mensagem']);
            }
            ?>
            <form action="cadastroCliente.php" method="post">
                <div class="mb-3">
                    <label class="form-label" for="email">E-mail</label>
                    <input name="email" type="email" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="senha">Senha</label>
                    <input type="password" class="form-control" name="senha" required>
                </div>
                <input class="btn btn-outline-danger" type="button" value="Cancelar">
                <input class="btn btn-outline-success" type="submit" value="Salvar">
            </form>
        </div>
        <div class="col-md-3"></div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
