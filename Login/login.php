<?php
session_start();

if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    // Conectar ao banco de dados
    $host = 'localhost';
    $user = 'root';
    $senha_user = '';
    $banco = 'tj';

    $con = mysqli_connect($host, $user, $senha_user, $banco);

    // Verifique se a conexão foi bem-sucedida
    if (!$con) {
        die("Falha na conexão: " . mysqli_connect_error());
    }

    // Prepare a consulta SQL
    $sql = "SELECT id, senha FROM cadastro WHERE email = ?";
    $stmt = $con->prepare($sql);

    if ($stmt) {
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $stmt->store_result();
        $stmt->bind_result($id, $senha_hash);
        $stmt->fetch();

        // Adicionar depuração para verificação
        echo "Número de linhas encontradas: " . $stmt->num_rows . "<br>";
        echo "Email: " . $email . "<br>";
        echo "Senha: " . $senha . "<br>";
        echo "Hash de senha no banco de dados: " . $senha_hash . "<br>";

        // Verifique se encontrou um resultado
        if ($stmt->num_rows > 0) {
            // Verifica se a senha está correta
            if (password_verify($senha, $senha_hash)) {
                $_SESSION['id'] = $id;
                echo "Login bem-sucedido, redirecionando...";
                header("location: inicial.php");
                exit;
            } else {
                echo "Senha incorreta.";
            }
        } else {
            echo "E-mail não encontrado.";
        }

        $stmt->close();
    } else {
        echo "Erro na preparação da consulta: " . $con->error;
    }

    // Fechar a conexão
    mysqli_close($con);
} else {
    echo "O formulário não foi submetido.";
}
?>
