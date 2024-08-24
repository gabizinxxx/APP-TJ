<?php
include_once('nome.php');
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="inicial.css">
    <title>Home page</title>
</head>
<body>
    <img src="imgperfi.png" alt="perfil">
    <h2>Olá, <?php echo $nomeUsuario; ?></h2>
    <h4>Chegou a hora de estudar</h4>
    <form method="get">
        <div class="pesquisa" >
        <input type="text" name="pesquisa" placeholder="Buscar">
        <a class="btn" href="#"> </a>
        <i class="fas fa-search"></i>
    </div>
    </form>
    
    
</body>
</html>