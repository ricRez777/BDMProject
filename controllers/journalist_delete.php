<?php 
    session_start();
    require_once ("../models/user.php");

    $id = $_POST['id_Journalist'];

    $obj_Journalist_Delete = new user($id, "", "", "", "", "", "", "");

    if($obj_Journalist_Delete->Confirm_Delete_User()){
        ?>
            <script>
                alert("La petición ha sido enviada");
            </script>
        <?php
        header('Location: ../admin_dashboard.php');
    }
    else{
        echo "Error, no se pudo eliminar";
    }


?>