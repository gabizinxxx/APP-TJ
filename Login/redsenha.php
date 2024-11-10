<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "tj";


if (isset($_GET['token'])) {
    $token = $_GET['token'];

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Conexão falhou: " . $conn->connect_error);
    }

    
    $sql = "SELECT email FROM resetar_tokens WHERE token = ? AND expiry > NOW()";
    $stmt = $conn->prepare($sql);

    if ($stmt) {
        $stmt->bind_param("s", $token);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $email = $row['email'];
        } else {
            echo "Token inválido ou expirado.";
            $stmt->close();
            $conn->close();
            exit;
        }

        $stmt->close();
    } else {
        echo "Erro na preparação da consulta: " . $conn->error;
        $conn->close();
        exit;
    }
    
    $conn->close();
} else {
    echo "Token não fornecido.";
    exit;
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">     
    <link rel="stylesheet" href="senhared.css">
    <title>Redefinir Senha</title>
</head>
<body>
    <div class="container">
        <h2>Redefinir sua senha</h2>
        <form action="atualsenha.php" method="POST">
            <div class="form-group">
                <input type="hidden" name="email" value="<?php echo htmlspecialchars($email, ENT_QUOTES, 'UTF-8'); ?>">
                <input type="hidden" name="token" value="<?php echo htmlspecialchars($token, ENT_QUOTES, 'UTF-8'); ?>">
                <label for="password">Nova senha:</label>
                <input type="password" id="password" name="password" placeholder="Digite a nova senha" required>                  
                <button type="submit" name="submit" id="submit">Redefinir</button>
            </div>
        </form>
    </div>
</body>
</html>
