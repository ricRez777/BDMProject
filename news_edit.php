<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edition</title>
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
    
    <?php 
        include("components/header.php"); 
        require_once ("models/news.php");
        $objNewsEdit = new news($_POST['idNew'], '', '', '', null, null, '', '', '', null, null, $_SESSION['idUse']);
    ?>
    <div class="container-row">
        
        <div class="sidenav-area">
            <?php include("components/sidebar_journalist.php"); ?>
        </div>
        
        <div class="content-area">

            <div class="container">
                <?php 
                    include("components/maincategories.php");
                ?>
            </div>
            
            <section id="Images" class="images-cards">

                <?php 
                    $objNewsEdit->get_Edition();
                ?>

            </section>
        </div>
    </div>
    <script src="js/modal.js"></script>
    <script src="js/functions.js"></script>
    <script src="js/scripts.js"></script>
</body>

</html>