<?php 
    require_once ("models/news.php");
    require_once ("models/image.php");

    if(isset($_POST['textsearch'])){
        $Text = $_POST['textsearch'];
    }
    else if(isset($_GET['textsearch'])){
        $Text = $_GET['textsearch'];
    }
    /*else{
        $Text = '';
    }

    if($Text = ''){
        header('Location: ../index.php');
    }*/

    $objNewsSearch = new news(0, '', '', $Text, '', '', '', '', '', 0, '', 0);


?>