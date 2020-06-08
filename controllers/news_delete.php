<?php 
    require_once ("../models/news.php");

    $idNew = $_POST['idNew'];

    $Obj_News_Delete = new news($idNew, '', '', '', '', null, '', '', '', 1, '', '');

    if($Obj_News_Delete->Delete_News()){
        ?>
        <script>
            alert("Noticia eliminada");
        </script>
        <?php
        header('Location: ../journalist_dashboard.php');
    }

?>