<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Loja de Sapatos - Meias</title>
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
    <h1 class="my-4 text-center">Meias Disponíveis</h1>
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

        $sql = "SELECT * FROM meias";
        $result = $conn->query($sql);

        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['delete_id'])) {
            $delete_id = $_POST['delete_id'];
            $delete_sql = "DELETE FROM meias WHERE id = ?";
            $stmt = $conn->prepare($delete_sql);
            $stmt->bind_param("i", $delete_id);
            $stmt->execute();
            $stmt->close();
            header("Location: " . $_SERVER['PHP_SELF']);
            exit();
        }

        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo '<div class="col-md-4">';
                echo '<div class="card">';
                echo '<img src="' . $row["imagem"] . '" class="card-img-top" alt="Imagem da Meia">';
                echo '<div class="card-body">';
                echo '<h5 class="card-title">' . $row["descricao"] . '</h5>';
                echo '<p class="card-text">Preço: R$ ' . $row["preco"] . '</p>';
                echo '<form method="POST" action="">';
                echo '<input type="hidden" name="delete_id" value="' . $row["id"] . '">';
                echo '<button type="submit" class="btn btn-danger btn-sm">Deletar</button>';
                echo '</div>';
                echo '</div>';
                echo '</div>';
            }
        } else {
            echo '<p class="text-center">Nenhuma meia encontrada.</p>';
        }

        $conn->close();
        ?>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

