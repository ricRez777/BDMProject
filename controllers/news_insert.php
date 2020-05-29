<?php

    require_once ("../models/news.php");
    require_once ("../models/image.php");
    session_start();

    $Title = $_POST['txtTitle'];
    $Description = $_POST['txtDescription'];
    $EventDate = $_POST['eventDate'];
    $Location = $_POST['txtLocation'];
    $PublicationDate = $_POST['publicationDate'];
    $Keywords = $_POST['txtKeywords'];
    $Section = $_POST['IdSection'];
    $Drafting = $_POST['txtDrafting'];
    $status = $_POST['status'];

    $Num_images = count($_FILES['images']['tmp_name']);
    for($i = 0; $i <= $Num_images; $i++){
        if(!empty($_FILES['images']['tmp_name'][$i])){
            $ruta_nueva_image[$i] = addslashes(file_get_contents($_FILES['images']['tmp_name'][$i]));
        }
    }
    
    $Num_Videos = count($_FILES['videos']['tmp_name']);
    for($i = 0; $i <= $Num_Videos; $i++){
        if(!empty($_FILES['videos']['tmp_name'][$i])){
            $ruta_nueva_video[$i] = addslashes(file_get_contents($_FILES['videos']['tmp_name'][$i]));
        }
    }

    /*Objeto para inserta la noticia*/
    $Obj_News_Insert = new news (0, $Title, $Description, $Drafting, $EventDate, $PublicationDate, $Location, $Keywords, $status, 1, $Section, $_SESSION['idUse']);

    if($Obj_News_Insert->Insert_News()){
        /*Objeto para insertar las imagenes de la noticia*/
        $ObjImage = new image (0, 0, 0, 0);
        $ObjImage->Last_Inserted();
        $ObjImage->setImage($ruta_nueva_image);
        if($ObjImage->Insert_Image()){
            header('Location: ../journalist_dashboard.php');
        }
        else{
            echo "ocurrio un erro al insertar la imagen";
        }
    }
    else{
        echo "ocurrio un error al insertar la noticia";
    }

    /*echo "Title: " . $Title . "<br>";
    echo "Description: " . $Description . "<br>";
    echo "EventDate: " . $EventDate . "<br>";
    echo "Location: " . $Location . "<br>";
    echo "PublicationDate: " . $PublicationDate . "<br>";
    echo "Keywords: " . $Keywords . "<br>";
    echo "Section: " . $Section . "<br>";
    echo "Drafting: " . $Drafting . "<br>";
    echo "Numero de videos: " . $Num_Videos . "<br>";
    echo "Video: " . $ruta_nueva[0] . "<br>";
    echo "Video: " . $ruta_nueva[1] . "<br>";*/

?>