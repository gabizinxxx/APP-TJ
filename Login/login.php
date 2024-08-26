<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "tj";

// Criando conexão
$con =  mysqli_connect($servername, $username, $password, $dbname);

if ($con->connect_error) {
    die("Conexão falhou: " . $con->connect_error);
}

if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    echo "Formulário enviado. Email: " . htmlspecialchars($email, ENT_QUOTES, 'UTF-8') . "<br>";
}

// SQL para buscar o usuário pelo email
$sql = "SELECT id, nome, senha FROM cadastro WHERE email = ?";
$stmt = $con->prepare($sql);

if ($stmt) {
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Usuário encontrado
        $row = $result->fetch_assoc();
        echo "Usuário encontrado. ID: " . htmlspecialchars($row['id'], ENT_QUOTES, 'UTF-8') . ", Nome: " . htmlspecialchars($row['nome'], ENT_QUOTES, 'UTF-8') . "<br>";
        
        // Verificar a senha
        if (password_verify($senha, $row['senha'])) {
            // Senha correta, armazenar nome e ID na sessão
            $_SESSION['id'] = $row['id'];
            $_SESSION['nomeUsuario'] = $row['nome'];
            
            echo "Senha correta. Redirecionando para inicial.php...<br>";

            // Redirecionar para a página inicial
            header("location: inicial.php");
            exit;
        } else {
            echo "Senha incorreta.<br>";
            header("location: senhaerror.html");
        }
    } else {
        echo "Email não encontrado.<br>";
        header("location: emailerror.html");
    }

    $stmt->close();
} else {
    echo "Erro na preparação da consulta: " . $con->error . "<br>";
}

$con->close();
?>
