<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>
    <title>Perfil</title>
</head>
<?php
session_start();
if (!isset($_SESSION['nome'])) {
    
    header("Location: index.html");
    exit;}
?>
  <style>
   body {
            background-color: #241c8b;
            color: white;
            font-family: 'Arial', sans-serif;
            text-align: center;
            margin: 0;
            padding: 0;
        }
        .navbar {
            display: flex;
            justify-content: space-around;
            padding: 20px;
        }
        .navbar a {
            color: white;
            text-decoration: none;
            margin: 0 20px;
            font-size: 25px;
        }
        .navbar a.active {
            border-bottom: 2px solid white;
        }
        .profile {
            margin-top: 50px;
        }
        .profile img {
            border-radius: 50%;
            width: 150px;
            height: 150px;
        }
        .profile h1 {
            font-size: 24px;
            margin: 20px 0;
        }
        .options {
            margin-top: 50px;
            text-align: left;
            display: inline-block;
        }
        .options a {
            display: block;
            color: white;
            text-decoration: none;
            font-size: 18px;
            margin: 10px 0;
        }
  </style>
 <body>
  <div class="navbar">
   <a href="home.php">
    Home
   </a>
   <a href="chat.html">
    Chat
   </a>
   <a href="agenda.html">
    Agenda
   </a>
   <a class="active" href="perfil.php">
    Perfil
   </a>
  </div>
  <div class="profile">
   <img alt="Foto do estudante" height="150" src="ze.jpg" width="150"/>
   <h1>
   <?php echo htmlspecialchars($_SESSION['nome'])?>
   </h1>
  </div>
  <div class="options">
   <a href="#">
    CONSULTAR / ALTERAR DADOS
   </a>
   <a href="#">
    PRIVACIDADE
   </a>
   <a href="#">
    SUPORTE
   </a>
   <a href="index.html">
    SAIR
   </a>
  </div>
 </body>
</html>
</body>
</html>