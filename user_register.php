<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Worl News Center | User Register</title>
    <link rel="stylesheet" href="css/style.css">
    <link href="https://fonts.googleapis.com/css?family=Raleway&display=swap" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"
        integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <script src="js/jquery-3.4.1.min.js"></script>
    <script src="js/main.js"></script>
</head>

<body>
    <div class="container">
        <?php include("components/header.php"); ?>

        <form class="formRegisterUse" action="" Method="Post">
            
            <div class="divInputs">
                <h1>Register</h1>
                <label for="Name" class="formLabel">Name</label>
                <input type="text" name="Name" placeholder="Name" class="formText">
                
                <label for="LastName" class="formLabel">Last Name</label>
                <input type="text" name="LastName" placeholder="Last Name" class="formText">
                
                <label for="Email" class="formLabel">E-mail</label>
                <input type="e-mail" name="Email" placeholder="Email" class="formText">
                
                <label for="UserName" class="formLabel">UserName</label>
                <p>*Your username will be used as your signature*</p>
                <input type="text" name="UserName" placeholder="User Name" class="formText">
                
                <label for="Pass" class="formLabel">Password</label>
                <input type="password" name="Pass" placeholder="Password" class="formText">
                
                <label for="Photo" class="formLabel">Profile Picture</label>
                <input type="file" name="Photo" class="formText">
                
                <input type="submit" value="Register now!" class="btn-Secondary">
            </div>
            <img src="img/register.jpg" width="500" height="400" alt="">
        </form>
        <?php include("components/footer.php") ?>
    </div>

</body>

</html>