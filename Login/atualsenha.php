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

    // Verificar se o token é válido
    $sql = "SELECT token FROM resetar_tokens WHERE email = ? AND token = ? AND expiry > NOW()";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $email, $token);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Hash da nova senha
        $hashedPassword = password_hash($senha, PASSWORD_DEFAULT);

        // Atualizar a senha
        $sql = "UPDATE cadastro SET senha = ? WHERE email = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ss", $hashedPassword, $email);
        $stmt->execute();

        // Remover o token
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
