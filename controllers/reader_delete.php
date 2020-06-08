<?php

    require_once ("../models/user.php");

    $idUse = $_POST['idUse'];

    $objUserDelete = new user($idUse, '', '', '', '', '', '', '');

    if($objUserDelete->Delete_User()){
        session_start();

        session_destroy();

        header('Location: ../index.php');
        exit();
    }

?>