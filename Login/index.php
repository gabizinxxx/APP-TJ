<?php

session_start();

$servername = "localhost"; 
$username = "root"; 
$password = ""; 
$dbname = "tj"; 


$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $nome = htmlspecialchars(trim($_POST['nome']));
    $email = htmlspecialchars(trim($_POST['email']));
    $senha = htmlspecialchars(trim($_POST['senha']));

    
    $senha_hash = password_hash($senha, PASSWORD_DEFAULT);

    $stmt = $conn->prepare("INSERT INTO cadastro (nome, email, senha) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $nome, $email, $senha_hash);

    if ($stmt->execute()) {
        
        $_SESSION['nome'] = $nome;
        
        header("Location: home.php");
        exit();
    } else {
        echo "Erro: " . $stmt->error;
    }

    
    $stmt->close();
} else {
    header("Location: index.html");
    exit();
}

$conn->close();
?>