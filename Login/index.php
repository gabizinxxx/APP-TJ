<?php
if(isset($_POST['submit'])) {
    // Pegando os dados do formulário
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha_hash = password_hash($_POST['senha'], PASSWORD_DEFAULT);

    // Dados do banco de dados
    $host = 'localhost';
    $user = 'root';
    $senha_user = '';
    $banco = 'tj';

    // Criando a conexão
    $con =  mysqli_connect($host, $user, $senha_user, $banco);

    // Verificando a conexão
    if ($con->connect_error) {
        die("Conexão falhou: " . $con->connect_error);
    }

    // Preparando a consulta SQL para inserção
    $sql = "INSERT INTO cadastro (nome, email, senha) VALUES (?, ?, ?)";
    $stmt = $con->prepare($sql);
    
    if ($stmt) {
        // Ligando os parâmetros e executando a consulta
        $stmt->bind_param("sss", $nome, $email, $senha_hash);

        if ($stmt->execute()) {
            echo "Usuário cadastrado com sucesso!";
            
        } else {
            echo "Erro: " . $stmt->error;
        }

        // Fechando a declaração
        $stmt->close();
    } else {
        echo "Erro na preparação da consulta: " . $con->error;
    }

    // Fechando a conexão
    $con->close();
}
?>
