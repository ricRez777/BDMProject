<?php 

    session_start();

    require_once ("../models/user.php");

    $email = $_POST["Email"];
    $pass = $_POST["Pass"];

    $objLogin = new user("", "", $email, $pass, "", "", "", "");

    if($objLogin->Login_User()){
      $_SESSION['Type_Use'] = $objLogin->getType_use();
      $_SESSION['idUse'] = $objLogin->getIdUse();
      $_SESSION['Name'] = $objLogin->getnameComplate();
      $_SESSION['Email'] = $objLogin->getEmail();
      $_SESSION['Pass'] = $objLogin->getPass();
      $_SESSION['Id_Use'] = $objLogin->getIdUse();
      $_SESSION['Photo'] = $objLogin->getProfilePicture();
      $_SESSION['firm'] = $objLogin->getFirm();
      $_SESSION['phone'] = $objLogin->getPhone();

      header('Location: ../index.php');
    
    }
    else{
      echo "Acceso denegado";
    }


?>