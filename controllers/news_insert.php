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
    $Keywords = $_POST['txtKeywords'];
    $Section = $_POST['IdSection'];
    $Drafting = $_POST['txtDrafting'];
    
    if(isset($_POST['status'])){
        $status = $_POST['status'];
    }
    else{
        $status = "EDITION";
    }

    /*Objeto para inserta la noticia*/
    $Obj_News_Insert = new news(0, $Title, $Description, $Drafting, $EventDate, null, $Location, $Keywords, $status, 1, $Section, $_SESSION['idUse']);

    if($Obj_News_Insert->Insert_News()){

        $ObjImage = new image(0, 0, 0, 0);
        $ObjImage->Last_Inserted();

        $Num_images = count($_FILES['images']['tmp_name']); //Obtenemos el numero de imagenes subidas y las guardamos en un arreglo
        for($i = 0; $i <= $Num_images; $i++){
            if(!empty($_FILES['images']['tmp_name'][$i])){
                
                $nombreImg = $_FILES['images']['name'][$i]; //obtenemos el nombre del archivo
                $archivoImg = $_FILES['images']['tmp_name'][$i]; //Contenemos el archivo
                rename($archivoImg, "images_bd/" . $ObjImage->getIdNew() . "_" . $i .  ".jpg"); //renombramos la imagen
                $rutaImg[$i] = "images_bd/" . $ObjImage->getIdNew() . "_" . $i .  ".jpg"; //Guardamos la nueva ruta
                move_uploaded_file($archivoImg, $rutaImg[$i]); //movemos el archivo a la nueva ruta
                
            }
        }
        //-----------------------------------------------------------------------------------------------------------------------------

        $ObjVideo = new video(0, 0, 0, 0); //obj de la clase video
        $ObjVideo->Last_Inserted(); //obtenemos la noticia que acaba de ser insertada

        $Num_Videos = count($_FILES['videos']['tmp_name']); //Obtenemos el numero de videos subidos y las guardamos en un arreglo
        for($i = 0; $i <= $Num_Videos; $i++){
            if(!empty($_FILES['videos']['tmp_name'][$i])){

                $nombreVid = $_FILES['videos']['name'][$i]; //obtenemos el nombre del archivo
                $archivoVid = $_FILES['videos']['tmp_name'][$i]; //Contenemos el archivo
                rename($archivoVid, "videos_bd/" . $ObjVideo->getIdNew() . "_" . $i .  ".mp4"); //renombramos el video
                $rutaVid[$i] = "videos_bd/" . $ObjVideo->getIdNew() . "_" . $i .  ".mp4"; //Guardamos la nueva ruta
                move_uploaded_file($archivoVid, $rutaVid[$i]); //movemos el archivo a la nueva ruta

            }
        }

        for($i = 0; $i < $Num_images; $i++){
            $ObjImage->setImage($rutaImg[$i]);
            $ObjImage->Insert_Image();
        }

        for($v = 0; $v < $Num_Videos; $v++){
            $ObjVideo->setVideo($rutaVid[$v]);
            $ObjVideo->Insert_Video();
        }
        ?>
            <script>
                alert("La noticia ha sido insertada");
            </script>
        <?php
        header('Location: ../journalist_dashboard.php');
    }
    else{
        echo "ocurrio un error al insertar la noticia <br>";
        header('Location: ../journalist_dashboard.php');
    }

?>