<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Worl News Center</title>
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
        include("controllers/news_show.php");
        require_once "models/like.php";
        require_once "models/commentary.php";
    ?>
    <div class="container-row">

        <div class="sidenav-area">
        <?php 
                if( !isset($_SESSION['Type_Use'])){
                    /*Para cuando no esta logeado nadie*/
                    include("components/sidebar_no_register.php");
                }
                else{
                    if($_SESSION['Type_Use'] == "ADMIN"){
                        include("components/sidebar_admin.php");
                    }
                    else if($_SESSION['Type_Use'] == "JOURNALIST"){
                        include("components/sidebar_journalist.php");
                    }
                    else if($_SESSION['Type_Use'] == "READER"){
                        include("components/sidebar_use.php");
                    }
                }
            ?>
        </div>

        <div class="content-area">

            <div class="container">
                <?php 
                    include("components/maincategories.php");
                ?>
            </div>
        
            <div class="containerNews">
                <div>
                    <br>
                    <h1><?php echo $objNewShow->getTitle(); ?></h1>
                    <br>
                    <p>
                        <?php echo $objNewShow->getDescription(); ?>
                    </p>
                    <br>
                    <p><strong>Localización: </strong><?php echo $objNewShow->getLocation(); ?></p>
                    <p><strong>Fecha del evento: </strong><?php echo $objNewShow->getEventDate(); ?></p>
                    <br>
                    <?php include("components/slider.php"); ?>
                    <br>
                    <p>
                        <?php echo $objNewShow->getTextNews(); ?>
                    </p>
                    <br>
                    <video src="<?php echo "controllers/" . $objVideoShow->getVideo();?>" width="700" controls></video>
                    <br>
                    <br>
                    <p><strong>Publicado el: </strong><?php echo $objNewShow->getPublicationDate(); ?></p>
                    <p><strong>Escrito por: </strong><?php echo $objNewShow->getFirm(); ?></p>
                    <br>
                    <hr>
                    <?php include("components/comments.php") ?>
                </div>
                <?php include("components/breakingNews.php") ?>
            </div>
        </div>
    </div>
</body>

</html>