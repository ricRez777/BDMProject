<?php 

    session_start();

    require_once ("../models/user.php");

    $email = $_POST["Email"];
    $pass = $_POST["Pass"];

    $objLogin = new user("", "", $email, $pass, "", "", "", "");

    if($objLogin->Login_User()){
		header('Location: ../index.php');
	}
	else{
		echo "Acceso denegado";
	}


?>