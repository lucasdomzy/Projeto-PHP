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
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    $sql = "INSERT INTO clientes (email, senha) VALUES (?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $email, $senha);

    if ($stmt->execute()) {
        $_SESSION['mensagem'] = "Cadastro concluído com sucesso!";
    } else {
        $_SESSION['mensagem'] = "Erro ao cadastrar: " . $conn->error;
    }

    $stmt->close();
}

$conn->close();

header("Location: cadastro.php");
exit();
?>