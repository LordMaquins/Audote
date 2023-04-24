<?php
require 'config.php';
if(!empty($_SESSION["id"])){
    $id = $_SESSION["id"];
    $result = mysqli_query($conn, "SELECT * FROM usuarios WHERE id = $id");
    $row = mysqli_fetch_assoc($result);
}else {
    header("Location: reglog.php");
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
    <link rel="stylesheet" href="style-inicio.css">
    <link
            rel="stylesheet"
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css"
        />
</head>
<body>

    <header>
            <nav>
                <ul class="nav-links">
                    <li>
                        <a href="#"><img src="./src/img/logo.jpg" alt=""></a>
                    </li>
                    <li><a href="cadastrarpet.php">Cadastrar Pet</a></li>
                    <li><a href="#">Quero adotar</a></li>
                    <li><a href="#">Quero ajudar</a></li>
                    <li><a href="#">Parcerias</a></li>

                    <li><a href="logout.php" class="sair">Olá, <?php 
                    
                    echo $row["nome"] . " " . $row["sobrenome"];

                    ?><br> Deseja sair?</a></li>


                    <!-- <a href="reglog.php" class="botao-entrar">Entrar</a> -->
                </ul>
                <div class="hamburger">
                    <div class="line"></div>
                    <div class="line"></div>
                    <div class="line"></div>
                  </div>
            </nav>
    </header>

    <div class="boas-vindas">
        <h2>Bem vindo <strong> <?php echo $row["nome"] . " " . $row["sobrenome"]; ?></strong></h2>
    </div>

    <div class="pets">
            <h2 class="h1 text-center my-5">Veja os nossos <strong>PETS</strong></h2>
            <div class="lista-de-imagens row">

                <?php
                    $stmt = $pdo->prepare("select * from pets");	
                    $stmt ->execute();
                    
                    while($row = $stmt ->fetch(PDO::FETCH_BOTH)){
                        
                    echo "
                        <div class='pet col-xl-3 col-md-5' style=\"--imagem-fundo:url('$row[10]');\">
                        <div class='preto'></div>
                        <div class='descricao'>
                            <h2>$row[1]</h2>
                            <h3>$row[2] $row[6] | $row[3]</h3>
                            <div class='oculto'>
                                <h4>Idade: $row[4] anos <br>
                                    Tamanho: $row[5] <br>
                                    Sexo: $row[6]</h4>
                                    <p>$row[7]</p>
                                    <ul>
                                        <li>$row[8]</li>
                                        <li>$row[9]</li>
                                    </ul>
                                    <h4><a href=''>Adote já</a></h4>
                            </div>
                        </div>
                    </div>
                    ";
                    
                    }
                ?>
            </div>
        </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="./src/js/app.js"></script>
</body>
</html>