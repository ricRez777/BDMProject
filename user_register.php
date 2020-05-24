<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Worl News Center | User Register</title>
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

        <form class="formRegisterUse" action="controllers/reader_insert.php" Method="Post" enctype="multipart/form-data">
            
            <div class="divInputs">
                <h1>Register</h1>
                <label for="Name" class="formLabel">Name</label>
                <input type="text" name="Name" placeholder="Name" class="formText">
                
                <label for="LastName" class="formLabel">Last Name</label>
                <input type="text" name="LastName" placeholder="Last Name" class="formText">
                
                <label for="Phone" class="formLabel">Cel Phone</label>
                <input type="number" name="Phone" placeholder="Phone" class="formText">

                <label for="Email" class="formLabel">E-mail</label>
                <input type="e-mail" name="Email" placeholder="Email" class="formText">
                
                <label for="Pass" class="formLabel">Password</label>
                <input type="password" name="Pass" placeholder="Password" class="formText">
                
                <section id="Images" class="images-cards">
                    <label for="image">Profile Picture</label>
                    <div class="row-container">
                        <div id="add-photo-container">
                            <div class="add-new-photo first" id="add-photo">
                                <span><i class="icon-camera"></i></span>
                            </div>
                            <input type="file" id="add-new-photo" name="image">
                        </div>
                    </div>
                </section>

                <input type="submit" value="Register now!" class="btn-Secondary">
            </div>
            <img src="img/register.jpg" width="500" height="400" alt="">
        </form>

    </div>


    <script src="js/modal.js"></script>
    <script src="js/functions.js"></script>
    <script src="js/scripts.js"></script>
</body>

</html>