<?php 
    require_once "../models/like.php";
    session_start();

    $status = $_POST['status'];
    $idNew = $_POST['idNew'];


    if(isset($_POST['likeInsert'])){
        $objLike = new like(0, $status, $_SESSION['idUse'], $idNew);
        if($objLike->Insert_Like()){
            echo "si se inserto el like";
            header("Location: ../news.php?idNew=" . $idNew);
        }
        else{
            echo "no se inserto el like";
        }

    }
    else if(isset($_POST['likeUpdate'])){
        $idLike = $_POST['idLike'];
        $objLike = new like($idLike, $status, $_SESSION['idUse'], $idNew);
        if($objLike->Change_Like()){
            echo "si se cambio el like";
            header("Location: ../news.php?idNew=" . $idNew);
        }
        else{
            echo "no se cambio el like";
        }
    }
?>