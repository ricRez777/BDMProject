<?php 
    require_once ("models/news.php");
    require_once ("models/image.php");

    if(isset($_POST['idSection'])){
        $idSection = $_POST['idSection'];
    }
    else if(isset($_GET['idSection'])){
        $idSection = $_GET['idSection'];
    }
    else{
        $idSection = 0;
    }

    $objNewsSection = new news(0, '', '', '', '', '', '', '', '', 0, $idSection, 0);


?>