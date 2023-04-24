<?php 
    session_start();
    $conn = mysqli_connect("localhost", "root", "", "audote");
    // $conn = mysqli_connect("sql213.epizy.com", "epiz_33977329", "PEfvg2chF8P", "epiz_33977329_audote");

    $servidor="localhost";
	$banco="audote";
	$usuario="root";
	$senha="";

    // $servidor="sql213.epizy.com";
	// $banco="epiz_33977329_audote";
	// $usuario="epiz_33977329";
	// $senha="PEfvg2chF8P";


	$pdo = new PDO("mysql:host=$servidor;dbname=$banco", $usuario, $senha);
?>