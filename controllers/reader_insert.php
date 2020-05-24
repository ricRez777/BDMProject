<?php 

    require_once ("../models/user.php");

    $Name = $_POST['Name'] . " " . $_POST['LastName'];
    $Email = $_POST['Email'];
    $Phone = $_POST['Phone'];
    $Pass = $_POST['Pass'];
    $Photo = addslashes(file_get_contents($_FILES['image']['tmp_name']));

    $obj_User_Insert = new user("", "READER", $Email, $Pass, $Name, $Phone, $Photo, "");

    if($obj_User_Insert->Insert_User()){
        header('Location: ../index.php');
        
    }
    else{
        echo "Ocurrio un error";
    }


?>