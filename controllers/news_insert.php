<?php

    require_once ("../models/section.php");

    $Title = $_POST['txtTitle'];
    $Description = $_POST['txtDescription'];
    $EventDate = $_POST['eventDate'];
    $Location = $_POST['txtLocation'];
    $PublicationDate = $_POST['publicationDate'];
    $Keywords = $_POST['txtKeywords'];
    $Section = $_POST['IdSection'];
    $Drafting = $_POST['txtDrafting'];
    //$Video = addslashes(file_get_contents($_FILES['videos']['tmp_name']));
    $Num_Videos = count($_FILES['videos']['tmp_name']);
    for($i = 0; $i <= $Num_Videos; $i++){
        if(!empty($_FILES['videos']['tmp_name'][$i])){
            $ruta_nueva[$i] = addslashes(file_get_contents($_FILES['videos']['tmp_name'][$i]));

        }
    }

    /*echo "Title: " . $Title . "<br>";
    echo "Description: " . $Description . "<br>";
    echo "EventDate: " . $EventDate . "<br>";
    echo "Location: " . $Location . "<br>";
    echo "PublicationDate: " . $PublicationDate . "<br>";
    echo "Keywords: " . $Keywords . "<br>";
    echo "Section: " . $Section . "<br>";
    echo "Drafting: " . $Drafting . "<br>";

    if(isset($_POST['draft'])){
        echo "DRAFT <br>";
    }
    if(isset($_POST['admin'])){
        echo "ADMIN <br>";
    }

    echo "Numero de videos: " . $Num_Videos . "<br>";
    echo "Video: " . $ruta_nueva[0] . "<br>";
    echo "Video: " . $ruta_nueva[1] . "<br>";*/

?>