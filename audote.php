<?php
require 'config.php';
if(!empty($_SESSION["id"])){
    $id = $_SESSION["id"];
    $result = mysqli_query($conn, "SELECT * FROM usuarios WHERE id = $id");
    $row = mysqli_fetch_assoc($result);
}else {
    header("Location: index.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/34e911297d.js" crossorigin="anonymous"></script>
    <title>Index</title>
    <link rel="stylesheet" href="src/style/style.css">
</head>
<body>
    <nav>
        <h1> <a href="#">Audote</a></h1>
        <ul>
            <li>
                <a href="#">Início</a>
            </li>

            <li>
                <a href="#">Pets</a>
            </li>
            <li>
                <a href="#">Perfil</a>
            </li>
        </ul>
    </nav>
    <div class="boas-vindas">
        <h2>Bem vindo <strong> <?php echo $row["nome"] . " " . $row["sobrenome"]; ?></strong></h2>
        <img src="src/img/adotar.svg" alt="">
        <p>Não temos nada aqui por enquanto <i class="fa-solid fa-dog"></i></p> 
        <a href="logout.php">Sair</a>
    </div>
</body>
</html>