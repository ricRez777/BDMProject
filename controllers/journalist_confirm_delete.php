<?php 
    session_start();
    require_once ("../models/user.php");

    $obj_Journalist_Delete = new user($_SESSION['idUse'], "", "", "", "", "", "", "");

    if($obj_Journalist_Delete->Delete_User()){

        session_destroy();

        header('Location: ../index.php');
        exit();
    }
    else{
        echo "Error, no se pudo eliminar";
    }


?>