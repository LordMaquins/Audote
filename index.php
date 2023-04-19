<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous"></script>
    <title>Formulário de login e cadastro</title>
    <link rel="stylesheet" href="src/style/reglog.css">
</head>

<body>
    <div class="container">
        <div class="forms-container">
            <div class="signin-signup">
                <form action="" class="sign-in-form" method="POST" onsubmit="enviarform(event)">
                    <h2 class="title">Fazer o Login</h2>
                    <div class="input-field">
                        <i class="fas fa-envelope"></i>
                        <input type="text" placeholder="Email" name="logemail" required>
                    </div>
                    <div class="input-field">
                        <i class="fas fa-lock"></i>
                        <input type="password" placeholder="Senha" name="logsenha" required>
                    </div>
                    <input type="submit" value="Entrar" class="btn solid" name="logsubmit" id="logsubmit">
                    <div class="erro" id="logerro">
                    </div>
                </form>

                <form action="#" class="sign-up-form" method="POST" onsubmit="enviarform(event)">
                    <h2 class="title">Cadastrar</h2>
                    <div class="input-field">
                        <i class="fas fa-user"></i>
                        <input type="text" placeholder="Primeiro nome" name="regnome" required>
                    </div>
                    <div class="input-field">
                        <i class="fas fa-user"></i>
                        <input type="text" placeholder="Sobrenome" name="regsobrenome" required>
                    </div>
                    <div class="input-field">
                        <i class="fas fa-envelope"></i>
                        <input type="email" placeholder="Email" name="regemail" required>
                    </div>
                    <div class="input-field">
                        <i class="fas fa-lock"></i>
                        <input type="password" placeholder="Senha" name="regsenha" required>
                    </div>
                    <div class="input-field">
                        <i class="fas fa-lock"></i>
                        <input type="password" placeholder="Confirmar senha" name="regconfirmarsenha" required>
                    </div>
                    <input type="submit" value="Cadastrar" class="btn solid" name="regsubmit" id="regsubmit">
                    <div class="erro" id="regerro">
                    </div>
                    <div class="acerto" id="acerto"></div>
                </form>
            </div>
        </div>
        <div class="panels-container">
            <div class="panel left-panel">
                <div class="content">
                    <h3>Novo por aqui?</h3>
                    <p>Faça já seu cadastro e <strong>Audote</strong> seu novo companheiro</p>
                    <button class="btn transparent" id="sign-up-btn">Cadastrar</button>
                </div>

                <img src="src/img/cachorro.svg" class="image" alt="">
            </div>

            <div class="panel right-panel">
                <div class="content">
                    <h3>Já tem uma conta?</h3>
                    <p>Entre e <strong>Audote</strong> agora seu novo companheiro</p>
                    <button class="btn transparent" id="sign-in-btn">Entrar</button>
                </div>
                
                <img src="src/img/dona.svg" class="image" alt="">
            </div>
        </div>
    </div>
    
    <script src="src/js/app.js"></script>
    <?php
    require 'config.php';

    // Não permitir que entre nessa tela se ja estiver logado

    if(!empty($_SESSION["id"])){
        header("Location: audote.php");
    }

    // Formulário de cadastro
    if(isset($_POST["regsubmit"])){
        // declarando as variaveis do formulário de cadastro
        $regnome = $_POST["regnome"];
        $regsobrenome = $_POST["regsobrenome"];
        $regemail = $_POST["regemail"];
        $regsenha = $_POST["regsenha"];
        $regconfirmarsenha = $_POST["regconfirmarsenha"];
        $duplicado = mysqli_query($conn, "SELECT * FROM usuarios WHERE email = '$regemail'");

        if(mysqli_num_rows($duplicado) > 0){
            echo 
            '<script>
            regerro.classList.add("active");
            regerro.innerHTML = "Desculpe mas esse Email já está em uso";
            </script>';
        } else {
            if($regsenha == $regconfirmarsenha) {
                $query = "INSERT INTO usuarios VALUES ('', '$regnome', '$regsobrenome', '$regemail', '$regsenha')";
                mysqli_query($conn,$query);
                echo 
                '<script>
                acerto.classList.add("active");
                acerto.innerHTML = "Registrado com sucesso";
                </script>';
            } else {
                echo 
                '<script>
                regerro.classList.add("active");
                regerro.innerHTML = "Os campos de senha não são iguais";
                </script>';
            }
        }
    }

    // Formulário de Login
    if(isset($_POST["logsubmit"])){
        $logemail = $_POST["logemail"];
        $logsenha = $_POST["logsenha"];
        $result = mysqli_query($conn, "SELECT * FROM usuarios WHERE email = '$logemail'");
        $row = mysqli_fetch_assoc($result);
        if(mysqli_num_rows($result) > 0){
            if($logsenha == $row["senha"]){
                $_SESSION["login"] = true;
                $_SESSION["id"] = $row["id"];
                header("location: audote.php");
            } else {
                echo 
                '<script>
                logerro.classList.add("active");
                logerro.innerHTML = "A senha está errada";
                </script>';
            }
        } else {
            echo
            '<script>
            logerro.classList.add("active");
            logerro.innerHTML = "Usuario não registrado";
            </script>';
        }
    }
?>

</body>

</html>