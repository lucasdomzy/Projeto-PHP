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
    $nome = $_POST['nome'];
    $descricao = $_POST['descricao'];
    $preco = $_POST['preco'];
    $imagem = $_POST['imagem'];

    if (!empty($nome) && !empty($descricao) && !empty($preco) && !empty($imagem)) {
        $sql = "INSERT INTO sapatos (nome, descricao, preco, imagem) VALUES (?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssds", $nome, $descricao, $preco, $imagem);

        if ($stmt->execute()) {
            $_SESSION['mensagem_tenis'] = "Cadastro de tênis concluído com sucesso!";
        } else {
            $_SESSION['mensagem_tenis'] = "Erro ao cadastrar tênis: " . $conn->error;
        }

        $stmt->close();
    } else {
        $_SESSION['mensagem_tenis'] = "Todos os campos são obrigatórios!";
    }
}

$conn->close();

header("Location: formTenis.php");
exit();
?>
