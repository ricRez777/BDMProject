<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notica busqueda</title>
    <link rel="stylesheet" href="css/style.css">
    <link href="https://fonts.googleapis.com/css?family=Raleway&display=swap" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <script src="js/jquery-3.4.1.min.js"></script>
    <script src="js/main.js"></script>
    <style>
        .btn-Primary{
            width: 8%;
        }
    </style>
</head>
<body>
    <?php 
        include("components/header.php"); 
        require_once ("controllers/news_list_search.php");
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
            
            <br>
            <h3>Resultados de la busqueda de <?php echo "'" . $Text . "'"; ?>: </h3>
            <br>
            <form action="news_search.php" method="POST">
                <input type="text" name="textsearch" hidden value="<?php echo $Text ?>">
                <input type="date" name="FechaInicio">
                <input type="date" name="FechaFin">
                <input type="submit" name="aplicarFechas" class="btn-Primary" value="Aplicar">
            </form>
            <section class="containerNewsPrev">
                <?php 
                    if(isset($_POST['aplicarFechas'])){
                        $objNewsSearch->search_News_date($_POST['FechaInicio'], $_POST['FechaFin']);
                    }
                    else{
                        $objNewsSearch->search_News();
                    } 
                ?>
            </section>

        </div>
    </div>
</body>
</html>