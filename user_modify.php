<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Modify</title>
    <link rel="stylesheet" href="css/icons.css">
    <link rel="stylesheet" href="css/grid.css">
    <link rel="stylesheet" href="css/modal.css">
    <link rel="stylesheet" href="css/styles_images.css">
    <link rel="stylesheet" href="css/style.css">
    <link href="https://fonts.googleapis.com/css?family=Raleway&display=swap" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"
        integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <script src="js/jquery-3.4.1.min.js"></script>
    <script src="js/main.js"></script>
</head>

<body>
    <?php include("components/header.php"); ?>
    <div class="container-row">

        <div class="sidenav-area">
            <?php include("components/sidebar_use.php"); ?>
        </div>

        <div class="content-area">

            <div class="container">
                <?php
                    include("components/maincategories.php");
                ?>

                <form class="formRegisterJournalist formModifyJournalist" action="controllers/reader_update.php" Method="Post" enctype="multipart/form-data">
                    <div class="divInputs">
                        <h1>User Journalist</h1>

                        <label for="Name" class="formLabel">Nombre</label>
                        <input type="text" name="Name" placeholder="Name" class="formText" value="<?php echo $_SESSION['Name'] ?>">

                        <label for="Phone" class="formLabel">Telefono</label>
                        <input type="number" name="Phone" placeholder="Phone" class="formText" value="<?php echo $_SESSION['phone'] ?>">
                        
                        <label for="Email" class="formLabel">E-mail</label>
                        <input type="e-mail" name="Email" placeholder="Email" class="formText" value="<?php echo $_SESSION['Email'] ?>">
                        
                        <label for="Pass" class="formLabel">Contraseña</label>
                        <input type="password" name="Pass" placeholder="Password" class="formText" value="<?php echo $_SESSION['Pass'] ?>">

                        <label for="Image">Tu foto actual</label>
                        <img src="data:image/jpg;base64,<?php echo base64_encode($_SESSION['Photo']) ?>" width=200 >
                        
                        <section id="Images" class="images-cards">
                            <label for="image">Carga una nueva foto de perfil</label>
                            <div class="row-container">
                                <div id="add-photo-container">
                                    <div class="add-new-photo first" id="add-photo">
                                        <span><i class="icon-camera"></i></span>
                                    </div>
                                    <input type="file" id="add-new-photo" name="image">
                                </div>
                            </div>
                        </section>

                        <input type="submit" value="Modificar" class="btn-Secondary">
                        <br>
                    </div>
                </form>
                <form action="controllers/reader_delete.php" Method="Post">
                    <input type="text" hidden name="idUse" value="<?php echo $_SESSION['idUse']?>">
                    <input type="submit" value="Cerrar mi cuenta" class="btn-Primary">
                </form>
            </div>
        </div>
    </div>

    <script src="js/modal.js"></script>
    <script src="js/functions.js"></script>
    <script src="js/scripts.js"></script>
</body>

</html>