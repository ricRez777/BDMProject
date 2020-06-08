<?php 
    require_once ("../models/news.php");
    require_once ("../models/video.php");

    $idNew = $_POST['id_News'];
    $video = $_POST['VideoCover'];

    $objNew = new news ($idNew, '', '', '', '', null, '', '', 'PUBLISHED', 0, '', '');
    $ObjVideo = new video($video, null, 1, 0);

    if($objNew->Change_Status() && $ObjVideo->Cover_Video() ){
        ?>
            <script>
                alert("La noticia ha sido publicada");
            </script>        
        <?php
        header('Location: ../journalist_dashboard.php');
    }
    else{
        echo "ocurrio un error";
        ?>
            <script>
                alert("No se pudo publicar la noticia");
            </script>        
        <?php
    }
?>