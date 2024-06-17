<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Meias</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .navbar {
            margin-bottom: 20px;
        }
    </style>
</head>
<body>

<?php
        include "topo.php";
    ?>  

<div class="container">
    <h1 class="my-4 text-center">Cadastro de Meias</h1>
    <div class="row">
        <div class="col-md-4"></div>
        <div class="col-md-5 m-2 p-3">
            <?php
            session_start();
            if (isset($_SESSION['mensagem_meias'])) {
                echo '<div class="alert alert-success" role="alert">';
                echo $_SESSION['mensagem_meias'];
                echo '</div>';
                unset($_SESSION['mensagem_meias']);
            }
            ?>
            <form action="cadastraMeia.php" method="post">
                <div class="mb-3">
                    <label class="form-label" for="descricao">Descrição</label>
                    <input name="descricao" type="text" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="preco">Preço</label>
                    <input type="number" step="0.01" class="form-control" name="preco" required>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="imagem">URL da Imagem</label>
                    <input name="imagem" type="url" class="form-control" required>
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
