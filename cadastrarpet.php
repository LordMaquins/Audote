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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
</head>

<body>

    <header>
        <nav>
            <ul class="nav-links">
                <li>
                    <a href="audote.php"><img src="./src/img/logo.jpg" alt=""></a>
                </li>
                <li><a href="#">Cadastrar Pet</a></li>
                <li><a href="#">Quero adotar</a></li>
                <li><a href="#">Quero ajudar</a></li>
                <li><a href="#">Parcerias</a></li>

                <li><a href="logout.php" class="sair">Olá,
                        <?php

                        echo $row["nome"] . " " . $row["sobrenome"];

                        ?><br> Deseja sair?
                    </a></li>


                <!-- <a href="reglog.php" class="botao-entrar">Entrar</a> -->
            </ul>
            <div class="hamburger">
                <div class="line"></div>
                <div class="line"></div>
                <div class="line"></div>
            </div>
        </nav>
    </header>


    <section>

        <form action="salvarpet.php" method="POST" enctype="multipart/form-data" class="container cadastrar-pet">

        <h1 class="text-center h1">Cadastre o seu Pet</h1>

            <div class="row">
                <div class="mb-3 col-md-6">
                    <label for="nomePet" class="form-label">Nome do Pet</label>
                    <input required type="text" placeholder="Ex: Rex, bob, Marley" name="nomePet" id="nomePet"
                        class="form-control" />
                </div>
                <div class="mb-3 col-md-6">
                    <label for="tipoAnimal" class="form-label">Tipo de animal</label>
                    <input required type="text" placeholder="Ex: Gato, cachorro, coelho" name="tipoAnimal"
                        id="tipoAnimal" class="form-control" />
                </div>
            </div>

            <div class="row">
                <div class="mb-3 col-md-6">
                    <label for="raca" class="form-label">Raça</label>
                    <input required type="text" placeholder="Ex: Rottweiler, Vira-lata, Akita inu" name="raca" id="raca"
                        class="form-control" />
                </div>

                <div class="mb-3 col-md-6">
                    <label for="idadePet" class="form-label">Idade do Pet</label>
                    <input required type="number" placeholder="Insira a idade em anos" name="idadePet" id="idadePet"
                        class="form-control" />
                </div>
            </div>

            <div class="row">
                <div class="mb-3 col-md-6">
                    <label for="porte" class="form-label">Porte do Pet</label>
                    <input required type="text" placeholder="Ex: pequeno, médio" name="porte" id="porte"
                        class="form-control" />
                </div>

                <div class="mb-3 col-md-6">
                    <label for="sexo" class="form-label">Sexo</label>
                    <select class="form-select" id="sexo" name="sexo" required>
                        <option selected disabled>Qual o sexo do seu PET?</option>
                        <option value="Macho">Macho</option>
                        <option value="Fêmea">Fêmea</option>
                    </select>
                </div>
            </div>

            <div class="mb-3">
                <label for="descricao" class="form-label">Descricao do Pet</label>
                <textarea name="descricao" id="descricao" cols="30" rows="10"
                    placeholder="Insira aqui a descrição/história do seu Pet" required class="form-control"
                    maxlength="255"></textarea>
            </div>

            <div class="row">
                <div class="mb-3 col-md-6">
                    <label for="vacinas" class="form-label">Vacinas</label>
                    <select class="form-select" id="vacina" name="vacina" required>
                        <option selected disabled>Seu PET é vacinado?</option>
                        <option value="Vacinado">Vacinado</option>
                        <option value="Não vacinado">Não vacinado</option>
                    </select>
                </div>

                <div class="mb-3 col-md-6">
                    <label for="vermifugado" class="form-label">Vermifugado</label>
                    <select class="form-select" id="vermifugado" name="vermifugado" required>
                        <option selected disabled>Seu PET é vermifugado?</option>
                        <option value="Vermifugado">Vermifugado</option>
                        <option value="Não vermifugado">Não vermifugado</option>
                    </select>
                </div>
            </div>

            <div class="mb-3">
                <label for="imagemPet" class="form-label">Imagem do Pet</label>
                <input required type="file" placeholder="Imagem do Pet" name="imagemPet" id="imagemPet"
                    class="form-control" />
            </div>

            <div class="row">
                <div class="mb-3">
                    <input type="submit" value="Salvar" class="btn btn-primary mb-3 col-md-12" />
                </div>
            </div>
        </form>

    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="./src/js/app.js"></script>
</body>

</html>