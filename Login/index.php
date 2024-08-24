<?php

if(isset($_POST['submit'])) {
    $nome = $_POST['name'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];
}

$host = 'localhost';
$user = 'root';
$senha_user = '';
$banco = 'tj';

$con = mysqli_connect($host,$user,$senha_user,$banco);

echo '<meta http-equiv="refresh" content="0;url=http://localhost/APP%20TJ/home/inicial.php">';

$rs = mysqli_query($con, "INSERT INTO cadastro(nome, email, senha) VALUES('$nome', '$email', '$senha')");

if($con){
    die("conexão errada" . mysqli_connect_error());
}

if($rs){
    echo"conexão 100%";
}













?>
