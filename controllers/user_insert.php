<?php 

    require_once ("../models/user.php");

    $Name = $_POST['Name'] . " " . $_POST['LastName'];
    $Phone = $_POST['Phone'];
    $Firm = $_POST['Firm'];
    $Email = $_POST['Email'];
    $Pass = $_POST['Pass'];
    $Role = $_POST['Role'];
    $Photo = addslashes(file_get_contents($_FILES['image']['tmp_name']));

    $obj_User_Insert = new user("", $Role, $Email, $Pass, $Name, $Phone, $Photo, $Firm);

    if($obj_User_Insert->Insert_User()){
        header('Location: ../admin_dashboard.php');
    }
    else{
        echo "Ocurrio un error";
    }


?>