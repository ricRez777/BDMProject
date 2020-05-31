<?php

    require_once ("../models/news.php");
    require_once ("../models/image.php");
    require_once ("../models/video.php");
    session_start();

    /*obtenemos todos los elementos de la noticia*/
    $Title = $_POST['txtTitle'];
    $Description = $_POST['txtDescription'];
    $EventDate = $_POST['eventDate'];
    $Location = $_POST['txtLocation'];
    $PublicationDate = $_POST['publicationDate'];
    $Keywords = $_POST['txtKeywords'];
    $Section = $_POST['IdSection'];
    $Drafting = $_POST['txtDrafting'];
    $status = $_POST['status'];

    /*Obtenemos el numero de imagenes subidas y las guardamos en un arreglo*/
    $Num_images = count($_FILES['images']['tmp_name']);
    for($i = 0; $i <= $Num_images; $i++){
        if(!empty($_FILES['images']['tmp_name'][$i])){
            $ruta_nueva_image[$i] = addslashes(file_get_contents($_FILES['images']['tmp_name'][$i]));
        }
    }
    
    /*Obtenemos el numero de videos subidos y las guardamos en un arreglo*/
    $Num_Videos = count($_FILES['videos']['tmp_name']);
    for($i = 0; $i <= $Num_Videos; $i++){
        if(!empty($_FILES['videos']['tmp_name'][$i])){
            $ruta_nueva_video[$i] = addslashes(file_get_contents($_FILES['videos']['tmp_name'][$i]));
        }
    }

    /*Objeto para inserta la noticia*/
    $Obj_News_Insert = new news(0, $Title, $Description, $Drafting, $EventDate, $PublicationDate, $Location, $Keywords, $status, 1, $Section, $_SESSION['idUse']);

    if($Obj_News_Insert->Insert_News()){
        
        /*Objeto para insertar las imagenes de la noticia*/
        $ObjImage = new image(0, 0, 0, 0);
        /*Objeto para insertar los videos de la noticia*/
        $ObjVideo = new video(0, 0, 0, 0);

        /*Proceso de imagen*/
        $ObjImage->Last_Inserted();
        $ObjImage->setImage($ruta_nueva_image);

        /*Proceso de video*/
        $ObjVideo->Last_Inserted();
        $ObjVideo->setVideo($ruta_nueva_video);

        if($ObjImage->Insert_Image() && $ObjVideo->Insert_Video()){
            header('Location: ../journalist_dashboard.php');
        }
        else{
            echo "ocurrio un erro al insertar la imagen";
        }
    }
    else{
        echo "ocurrio un error al insertar la noticia";
    }

?>