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
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    
    $stmt = $conn->prepare("SELECT * FROM cadastro WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $resultado = $stmt->get_result();

    if ($resultado->num_rows > 0) {
        $usuario = $resultado->fetch_assoc();
        
        if (password_verify($senha, $usuario['senha'])) {
            
            $_SESSION['nome'] = $usuario['nome'];
            header("Location: home.php");
            exit();
        } else {
            $_SESSION['loginErro'] = "Senha incorreta.";
            header("Location: index.php");
            exit();
        }
    } else {
        $_SESSION['loginErro'] = "Usuário não encontrado.";
        header("Location: index.php");
        exit();
    }
} else {
    header("Location: index.php");
    exit();
}

$conn->close();
?>