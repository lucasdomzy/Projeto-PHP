<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clientes Cadastrados</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .navbar {
            margin-bottom: 20px;
        }
        .table {
            margin-top: 20px;
        }
    </style>
</head>
<body>

<?php
    include "topo.php";
?>

<div class="container">
    <h1 class="my-4 text-center">Clientes Cadastrados</h1>
    <div class="row">
        <div class="col-md-12">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Email</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                    $servername = "localhost";
                    $username = "root";
                    $password = "1234";
                    $dbname = "loja_sapatos";

                    $conn = new mysqli($servername, $username, $password, $dbname);

                    if ($conn->connect_error) {
                        die("Conexão falhou: " . $conn->connect_error);
                    }

                    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['delete_id'])) {
                        $delete_id = $_POST['delete_id'];
                        $delete_sql = "DELETE FROM clientes WHERE id = ?";
                        $stmt = $conn->prepare($delete_sql);
                        $stmt->bind_param("i", $delete_id);
                        $stmt->execute();
                        $stmt->close();
                        echo "<div class='alert alert-success' role='alert'>Cliente deletado com sucesso.</div>";
                    }

                    $sql = "SELECT id, email FROM clientes";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td>" . $row["id"] . "</td>";
                            echo "<td>" . $row["email"] . "</td>";
                            echo "<td>
                                <form method='post' style='display:inline;'>
                                    <input type='hidden' name='delete_id' value='" . $row["id"] . "'>
                                    <button type='submit' class='btn btn-danger btn-sm'>Excluir</button>
                                </form>
                            </td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='3'>Nenhum cliente cadastrado.</td></tr>";
                    }

                    $conn->close();
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
