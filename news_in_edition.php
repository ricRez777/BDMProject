<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>News in edition</title>
    <link rel="stylesheet" href="css/style.css">
    <link href="https://fonts.googleapis.com/css?family=Raleway&display=swap" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"
        integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <script src="js/jquery-3.4.1.min.js"></script>
    <script src="js/main.js"></script>
</head>

<body>
    <?php 
    include("components/header.php"); 
    include("models/news.php"); 
    
    $idNews = $_POST['idNew'];

    $objNews = new news($idNews, '', '', '', '', '', '', '', '', '', '', '');
    
    ?>
    <div class="container-row">

        <div class="sidenav-area">
            <?php include("components/sidebar_admin.php"); ?>
        </div>

        <div class="content-area">

            <div class="container">
                <?php 
                    include("components/maincategories.php");
                ?>
            </div>

            <?php 
                $objNews->get_Finished(); //metodo de la clase news para mostrar la noticia
            ?>

        </div>
    </div>
</body>

</html>