<?php

$host = 'localhost';
$user = 'root';
$senha_user = '';
$banco = 'tj';

$con = new mysqli($host,$user,$senha_user,$banco);

if ($con->connect_error) {
    die("Conexão falhou: " . $con->connect_error);
}

$sql = "SELECT nome FROM cadastro where id";
$result = $con->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $nomeUsuario = $row["nome"];
    }
} else {
    echo "0 resultados";
}
$con->close();

?>