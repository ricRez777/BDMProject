<?php 

    require_once ("../models/section.php");

    $IdSection = $_POST['IdSection'];
    $NameSection = $_POST['NameSection'];
    $Main = $_POST['sectionMain'];
    $Colour = $_POST['Colour'];

    if($Main == 'on'){
        $Main = 1;
    }
    else{
        $Main = 0;
    }

    $objSections = new section($IdSection, $NameSection, $Colour, $Main);

    if($objSections->Update_Section()){
        header('Location: ../admin_dashboard.php');
    }
    else{
        echo "Error en el update";
    }


?>