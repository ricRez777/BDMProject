<?php
    require_once "../models/commentary.php";

    $idCommentary = $_POST['idCommentary'];
    $idNews = $_POST['idNews'];

    $objcommentaryInsert = new commentary($idCommentary, '', 0, 0);

    if($objcommentaryInsert->Delete_Commnetary()){
        echo "Si se elimino el comentario <br>";
        header("Location: ../news.php?idNew=" . $idNews);
    }
    else{
        echo "No se elimino el comentario <br>";
        header("Location: ../news.php?idNew=" . $idNews);
    }
?>