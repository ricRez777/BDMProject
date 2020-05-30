<?php 
    session_start();
    require_once ("../models/section.php");

    $id = $_POST['id_section'];

    $obj_section_delete = new section($id, "", "", "");

    if($obj_section_delete->Delete_Section()){
        header('Location: ../admin_dashboard.php');
    }
    else{
        echo "No se pudo eliminar la seccion";
    }


?>