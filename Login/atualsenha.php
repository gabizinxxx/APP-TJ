<?php
if (isset($_POST['submit'])) {
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "tj";

    $conn = mysqli_connect($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Conexão falhou: " . $conn->connect_error);
    }

    $email = $_POST['email'];
    $token = $_POST['token'];
    $senha = $_POST['senha'];

    
    $sql = "SELECT token FROM resetar_tokens WHERE email = ? AND token = ? AND expiry > NOW()";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $email, $token);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        
        $hashedPassword = password_hash($senha, PASSWORD_DEFAULT);

        
        $sql = "UPDATE cadastro SET senha = ? WHERE email = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ss", $hashedPassword, $email);
        $stmt->execute();

        
        $sql = "DELETE FROM resetar_tokens WHERE email = ? AND token = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ss", $email, $token);
        $stmt->execute();

        echo "Senha atualizada com sucesso.";
    } else {
        echo "Token inválido ou expirado.";
    }

    $stmt->close();
    $conn->close();
}
?>
