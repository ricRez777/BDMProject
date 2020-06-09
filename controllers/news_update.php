<?php

    require_once ("../models/news.php");
    session_start();
    
    $id_News = $_POST['id_News'];
    $Title = $_POST['txtTitle'];
    $Description = $_POST['txtDescription'];
    $EventDate = $_POST['eventDate'];
    $Location = $_POST['txtLocation'];
    $Keywords = $_POST['txtKeywords'];
    $Section = $_POST['IdSection'];
    $Drafting = $_POST['txtDrafting'];

    if(isset($_POST['status'])){
        $status = $_POST['status'];
    }
    else{
        $status = "EDITION";
    }

    /*Objeto para actualizar la noticia*/
    $Obj_News_Update = new news($id_News, $Title, $Description, $Drafting, $EventDate, null, $Location, $Keywords, $status, 1, $Section, $_SESSION['idUse']);

    if($Obj_News_Update->Update_News()){
        header('Location: ../journalist_dashboard.php');
    }
    else{
        echo "error";
    }


?>