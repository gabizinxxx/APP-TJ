<?php

if (isset($_POST['submit'])) {
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "tj";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Conexão falhou: " . $conn->connect_error);
    }

    $email = $_POST['email'];

    
    $sql = "SELECT id FROM cadastro WHERE email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
       
        $token = bin2hex(random_bytes(32));
        $expiry = date('Y-m-d H:i:s', strtotime('+1 hour'));

        
        $sql = "INSERT INTO resetar_tokens (email, token, expiry) VALUES (?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sss", $email, $token, $expiry);
        $stmt->execute();

      
        $to = $email;
        $subject = "Recuperação de Senha";
        $message = "Clique no link abaixo para redefinir sua senha:\n";
        $message .= "http://localhost/APP/Login/redsenha.php?token=" . $token;
        $headers = "From: no-reply@seusite.com";

        mail($to, $subject, $message, $headers);

        echo "E-mail de recuperação enviado.";
    } else {
        echo "E-mail não encontrado.";
    }

    $stmt->close();
    $conn->close();
}
?>
