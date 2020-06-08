<?php 
    require_once ("../models/news.php");
    require_once ("../models/video.php");

    $idNew = $_POST['id_News'];
    if(isset($_POST['VideoCover'])){
        $video = $_POST['VideoCover'];
    }
    if(isset($_POST['front'])){
        if($_POST['front'] == 'on'){
            $front = 1;
        }
    }
    else{
        $front = 0;
    }

    $objNew = new news ($idNew, '', '', '', '', null, '', '', 'PUBLISHED', $front, '', '');
    $ObjVideo = new video($video, null, 1, 0);

    if($objNew->Change_Status() && $ObjVideo->Cover_Video() ){
        ?>
            <script>
                alert("La noticia ha sido publicada");
            </script>        
        <?php
        header('Location: ../admin_dashboard.php');
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