<?php 

    require_once ("../models/section.php");

    $NameSection = $_POST['Section'];
    $Main = $_POST['sectionMain'];
    $Colour = $_POST['Colour'];

    if($Main == 'on'){
        $Main = 1;
    }
    else{
        $Main = 0;
    }

    $objSections = new section('', $NameSection, $Colour, $Main);

    if($objSections->Insert_Section()){
        header('Location: ../admin_dashboard.php');
    }
    else{
        echo "Error en el insert";
    }


?>