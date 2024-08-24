<?php

if(isset($_POST['submit'])) {
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha_hash = password_hash($_POST['senha'], PASSWORD_DEFAULT);
}

$host = 'localhost';
$user = 'root';
$senha_user = '';
$banco = 'tj';

$con = mysqli_connect($host,$user,$senha_user,$banco);

header("location: inicial.php");

$sql = "INSERT INTO cadastro (nome, email, senha) VALUES (?, ?, ?)";
    $stmt = $con->prepare($sql);
    $stmt->bind_param("sss", $nome, $email, $senha_hash);

    if ($stmt->execute()) {
        echo "Usuário cadastrado com sucesso!";
    } else {
        echo "Erro: " . $stmt->error;
    }

?>
