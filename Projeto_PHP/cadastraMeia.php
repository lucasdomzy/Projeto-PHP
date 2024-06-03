<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "1234";
$dbname = "loja_sapatos";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $descricao = $_POST['descricao'];
    $preco = $_POST['preco'];
    $imagem = $_POST['imagem'];

    $sql = "INSERT INTO meias (descricao, preco, imagem) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sds", $descricao, $preco, $imagem);

    if ($stmt->execute()) {
        $_SESSION['mensagem_meias'] = "Cadastro de meia concluído com sucesso!";
    } else {
        $_SESSION['mensagem_meias'] = "Erro ao cadastrar meia: " . $conn->error;
    }

    $stmt->close();
}

$conn->close();

header("Location: formMeias.php");
exit();
?>
