<?php 
    require_once ("models/news.php");
    require_once ("models/image.php");
    require_once ("models/video.php");

    if(isset($_POST['idNew'])){
        $idNew = $_POST['idNew'];
    }
    else if(isset($_GET['idNew'])){
        $idNew = $_GET['idNew'];
    }
    else{
        $idNew=0;
    }

    $objNewShow = new news($idNew, '', '', '', '', '', '', '', '', '', '', '');
    $objImgSlider = new image('', '', '', $idNew);
    $objVideoShow = new video('', '', '', $idNew);

    $objNewShow->get_News_Published();
    $objVideoShow->get_Video_Published();

?>