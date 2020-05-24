<?php 

    session_start();
    require_once ("../models/user.php");

    $success = false;
    $Name = $_POST['Name'];
    $Phone = $_POST['Phone'];
    $Email = $_POST['Email'];
    $Pass = $_POST['Pass'];
    $Photo = $_FILES['image'];
    if($_FILES['image']['tmp_name'] != null){
        $Photo = addslashes(file_get_contents($_FILES['image']['tmp_name']));
        $obj_User_Update = new user($_SESSION['idUse'], "", $Email, $Pass, $Name, $Phone, $Photo, "");
        
        if($obj_User_Update->Update_User()){
            echo "cambio foto <br>";
            echo "Usuario actualizado con el update original";
            $success = true;
        }
        else{
            echo "Ocurrio un error";
        }

    }
    else{
        $obj_User_Update = new user($_SESSION['idUse'], "", $Email, $Pass, $Name, $Phone, "", "");

        if($obj_User_Update->Update2_User()){
            echo "Usuario actualizado con el update2";
            $success = true;
        }
        else{
            echo "Ocurrio un error";
        }
    }

    if($success){
        session_destroy();

        session_start();
        
        $objLogin = new user("", "", $Email, $Pass, "", "", "", "");

        if($objLogin->Login_User()){
            $_SESSION['Type_Use'] = $objLogin->getType_use();
            $_SESSION['idUse'] = $objLogin->getIdUse();
            $_SESSION['Name'] = $objLogin->getnameComplate();
            $_SESSION['Email'] = $objLogin->getEmail();
            $_SESSION['Pass'] = $objLogin->getPass();
            $_SESSION['Id_Use'] = $objLogin->getIdUse();
            $_SESSION['Photo'] = $objLogin->getProfilePicture();
            $_SESSION['firm'] = "";
            $_SESSION['phone'] = $objLogin->getPhone();

            header('Location: ../index.php');
        }
        else{
            echo "Acceso denegado";
        }
    }


?>