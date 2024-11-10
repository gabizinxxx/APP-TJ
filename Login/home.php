<?php
session_start();
if (!isset($_SESSION['nome'])) {
    
    header("Location: index.html");
    exit;}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <title>Home</title>
</head>
<body>

<style>
    body {
    font-family: Arial, sans-serif;
    background-color: #f5f5f5;
    margin: 0;
    padding: 0;
}

.header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    background-color: #241c8b;
    color: white;
    padding: 20px;
}

.user-info {
    display: flex;
    align-items: center;
}

.user-photo {
    border-radius: 50%;
    width: 50px;
    height: 50px;
    margin-right: 10px;
}

.user-text h2 {
    margin: 0;
}

.user-text p {
    margin: 0;
}

.search-bar {
    padding: 10px;
    font-size: 16px;
    border: none;
    border-radius: 20px;
    margin-left: 700px;
}

.menu {
    background-color: #241c8b;
    display: flex;
    justify-content: space-around;
    padding: 10px 0;
    padding-bottom: 50px;
    text-decoration: none;
}

.menu ul {
    list-style: none;
    margin: 0;
    padding: 0;
    display: flex;
    text-decoration: none;
    justify-content: space-around;
}

.menu li {
    margin: 0 50px;
    color: white;
    font-size: 25px;
    cursor: pointer;
    text-decoration: none;
    justify-content: space-around;
}

.menu li.active {
    border-bottom: 2px solid white;
}

.content {
    padding: 20px;
}

.areas {
    display: flex;
    justify-content: space-around;
    margin-bottom: 30px;
}

.area-item {
    display: flex;
    flex-direction: column;
    align-items: center;
    text-align: center;
}

.area-item img {
    width: 60px;
    height: 60px;
    margin-bottom: 10px;
}

.tutors {
    display: flex;
    justify-content: space-around;
}

.tutor {
    margin-bottom: -18px;
    background-color: white;
    padding: 15px;
    border-radius: 10px;
    width: 200px;
    box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
    text-align: center;
    padding-left: 100px;
    padding-right: 100px;
    white-space: nowrap;
}

.tutor p {
    margin: 10px 0;
    
}

.tutor-img{
    margin-left: 150px;
    margin-top: -150px;
    width: 80px;
    height: 80px;
    border-radius: 50%;
    margin-bottom: 50px;
}

.tutor-img2{
    margin-left: 530px;
    margin-top: -150px;
    width: 80px;
    height: 80px;
    border-radius: 50%;
    margin-bottom: 50px;
}

.fa-search{
  margin-left: -70px;
    color: rgb(114, 99, 99);
}
a{
    text-decoration: none;
}

</style>

    <div class="header">
        <div class="user-info">
            <img src="ze.jpg" alt="Foto do estudante" class="user-photo">
            <div class="user-text">
                <h2>OLÁ,  <?php echo htmlspecialchars($_SESSION['nome'])?>!</h2>
                <p>CHEGOU A HORA DE ESTUDAR</p>
            </div>
        </div>
        
        <input type="text" class="search-bar" placeholder="Buscar matérias...">
        <i class="fas fa-search"></i>
    </div>
    <nav class="menu">
        <ul>
            <li class="active">Home</li>
            <a href="chat.html"><li>Chat</li></a>
            <a href="agenda.html"><li>Agenda</li></a>
            <a href="perfil.php"><li>Perfil</li></a>
        </ul>
    </nav>

    <div class="content">
        <h2>Áreas</h2>
        <div class="areas">
            <div class="area-item"> 
                <img src="math-6683827_1280.webp" alt="Exatas">
                <p>Exatas</p>
            </div>
            <div class="area-item"> 
                <img src="geography.png" alt="Humanas">
                <p>Humanas</p>
            </div>
            <div class="area-item"> 
                <img src="desconto.png" alt="Técnica">
                <p>Técnica</p>
            </div>
            <div class="area-item"> 
                <a href="lingua.html"><img src="noun-consulting-1326847.png" alt="Linguagens">
                </a><p>Linguagens</p>
            </div>
        </div>

        <h2>Tutores disponíveis</h2>

        <div class="tutors">
            <div class="tutor">
               
                <p><b>Gabriel da Silva França</b></p>
                
                <p>Informática (2º ano EM)</p>
               
                <p>⭐ 4.9</p>
            </div>
            <div class="tutor">
                <p><b>Brian Lima Oliveira</b></p>
                <p>Informática e Exatas (2º ano EM)</p>
                <p>⭐ 4.9</p>
            </div>
        </div>
    </div> 
    <img src="spidergab.jpg" alt="tutor" class="tutor-img">
    <img src="brian2.jpg" alt="tutor" class="tutor-img2">
    
</body>
</html>
