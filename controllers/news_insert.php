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
    //$Photo = addslashes(file_get_contents($_FILES['images']['tmp_name']));

    /*Obtenemos el numero de imagenes subidas y las guardamos en un arreglo*/
    $Num_images = count($_FILES['images']['tmp_name']);
    echo "Numero de imagenes cargadas: " . $Num_images . "<br>";
    for($i = 0; $i <= $Num_images; $i++){
        if(!empty($_FILES['images']['tmp_name'][$i])){
            $ruta_nueva_image[$i] = addslashes(file_get_contents($_FILES['images']['tmp_name'][$i]));
        }
    }
    /*for($j = 0; $j < $Num_images; $j++){
        echo "Imagen[" . $j . "] " . $ruta_nueva_image[$j] . "<br>";
    }*/
    
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
        
        $ObjImage = new image(0, 0, 0, 0);
        $ObjVideo = new video(0, 0, 0, 0);

        $ObjImage->Last_Inserted();
        $ObjVideo->Last_Inserted();

        for($i = 0; $i < $Num_images; $i++){
            $ObjImage->setImage($ruta_nueva_image[$i]);
            $ObjImage->Insert_Image();
        }

        for($v = 0; $v < $Num_Videos; $v++){
            $ObjVideo->setVideo($ruta_nueva_video[$v]);
            $ObjVideo->Insert_Video();
        }
    }
    else{
        echo "ocurrio un error al insertar la noticia <br>";
    }

?>