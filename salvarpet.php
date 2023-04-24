<?php

    include("config.php");

    $nomePet = $_POST['nomePet'];
    $tipoAnimal = $_POST['tipoAnimal'];
    $raca = $_POST['raca'];
    $idadePet = $_POST['idadePet'];
    $porte = $_POST['porte'];
    $sexo = $_POST['sexo'];
    $descricao = $_POST['descricao'];
    $vacina = $_POST['vacina'];
    $vermifugado = $_POST['vermifugado'];
    $imagemPet = $_FILES['imagemPet']['tmp_name'];

    $img_data = addslashes(file_get_contents($imagemPet));

    if ($_FILES['imagemPet']['name']) {
        $imagemPet = $_FILES['imagemPet']['name'];
        $imagemPet_temp = $_FILES['imagemPet']['tmp_name'];
        $destino = 'src/img/' . $imagemPet;
        move_uploaded_file($imagemPet_temp, $destino);
    }


    $sql = "INSERT INTO pets (idPet, nomePet, tipoAnimal, raca, idadePet, porte, sexo, descricao, vacinas, vermifugado, imagemPet) 
                VALUES (null, '$nomePet', '$tipoAnimal', '$raca', '$idadePet', '$porte', '$sexo', '$descricao', '$vacina', '$vermifugado', '$destino')";

    $stmt = $pdo->prepare($sql);

    $stmt->execute();
    header("location:audote.php");

?>