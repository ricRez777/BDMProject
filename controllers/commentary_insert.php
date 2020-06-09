<?php 

    require_once "../models/commentary.php";

    $textCommentary = $_POST['textCommentary'];
    $idNews = $_POST['idNews'];
    $idUse = $_POST['idUse'];

    $objcommentaryInsert = new commentary(0, $textCommentary, $idUse, $idNews);

    if($objcommentaryInsert->Insert_Commnetary()){
        echo "Si se inserto el comentario <br>";
        header("Location: ../news.php?idNew=" . $idNews);
    }
    else{
        echo "No se inserto el comentario <br>";
        header("Location: ../news.php?idNew=" . $idNews);
    }

?>