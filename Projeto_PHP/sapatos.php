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
        <?php

        $servername = "localhost";
        $username = "root";
        $password = "1234";
        $dbname = "loja_sapatos";

        $conn = new mysqli($servername, $username, $password, $dbname);

        if ($conn->connect_error) {
            die("Conexão falhou: " . $conn->connect_error);
        }

        $sql = "SELECT id, nome, descricao, preco, imagem FROM sapatos";
        $result = $conn->query($sql);

        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['delete_id'])) {
            $delete_id = $_POST['delete_id'];
            $delete_sql = "DELETE FROM sapatos WHERE id = ?";
            $stmt = $conn->prepare($delete_sql);
            $stmt->bind_param("i", $delete_id);
            $stmt->execute();
            $stmt->close();
            header("Location: " . $_SERVER['PHP_SELF']);
            exit();
        }

        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo '<div class="col-lg-4 col-md-6 mb-4">';
                echo '<div class="card h-100">';
                echo '<img class="card-img-top" src="' . $row["imagem"] . '" alt="' . $row["nome"] . '">';
                echo '<div class="card-body">';
                echo '<h4 class="card-title">' . $row["nome"] . '</h4>';
                echo '<p class="card-text">' . $row["descricao"] . '</p>';
                echo '</div>';
                echo '<div class="card-footer">';
                echo '<h5>R$ ' . $row["preco"] . '</h5>';
                echo '<form method="POST" action="">';
                echo '<input type="hidden" name="delete_id" value="' . $row["id"] . '">';
                echo '<button type="submit" class="btn btn-danger btn-sm">Deletar</button>';
                echo '</div>';
                echo '</div>';
                echo '</div>';
            }
        } else {
            echo "<div class='col-12'><p class='text-center'>Nenhum produto encontrado.</p></div>";
        }

        $conn->close();
        ?>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>