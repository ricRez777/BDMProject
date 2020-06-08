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
        require_once ("models/news.php");
        $objAllNews = new news(0, '', '', '', '', '', '', '', '', '', '', '');
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

            <!--BREAKING NEWS-->
            <div class="carousel js-carousel">
                <div class="titleNews">
                    <h3>BreakingNews</h3>
                    <div class="carousel__nav">
                        <button class="carousel__button--prev js-carousel-button" data-dir="prev">&lt;</button>
                        <button class="carousel__button--next js-carousel-button" data-dir="next">&gt;</button>
                    </div>
                </div>
                <div class="carousel__container js-carousel-container">
                    <div class="carousel__list js-carousel-list">
                        <?php $objAllNews->Breaking_News(); ?>
                    </div>
                </div>
            </div>
            <hr>
            <!--FRONT PAGE-->
            <div class="carousel js-carousel">
                <div class="titleNews">
                    <h3>Front Page</h3>
                    <div class="carousel__nav">
                        <button class="carousel__button--prev js-carousel-button" data-dir="prev">&lt;</button>
                        <button class="carousel__button--next js-carousel-button" data-dir="next">&gt;</button>
                    </div>
                </div>
                <div class="carousel__container js-carousel-container">
                    <div class="carousel__list js-carousel-list">
                        <?php $objAllNews->Front_News(); ?>
                    </div>
                </div>
            </div>
            <hr>
            <!--POLITICS-->
            <div class="carousel js-carousel">
                <div class="titleNews">
                    <h3>Politica</h3>
                    <div class="carousel__nav">
                        <button class="carousel__button--prev js-carousel-button" data-dir="prev">&lt;</button>
                        <button class="carousel__button--next js-carousel-button" data-dir="next">&gt;</button>
                    </div>
                </div>
                <div class="carousel__container js-carousel-container">
                    <div class="carousel__list js-carousel-list">
                        <?php $objAllNews->Sections_News_All_Index(2); ?>
                    </div>
                </div>
            </div>
            <hr>
            <!--SPORTS-->
            <div class="carousel js-carousel">
                <div class="titleNews">
                    <h3>Deportes</h3>
                    <div class="carousel__nav">
                        <button class="carousel__button--prev js-carousel-button" data-dir="prev">&lt;</button>
                        <button class="carousel__button--next js-carousel-button" data-dir="next">&gt;</button>
                    </div>
                </div>
                <div class="carousel__container js-carousel-container">
                    <div class="carousel__list js-carousel-list">
                        <?php $objAllNews->Sections_News_All_Index(5); ?>
                    </div>
                </div>
            </div>
            <hr>

        </div>

    </div>
    <!-- Script para el slider-card de las noticias -->
    <script src="js/slider-card.js"></script>
</body>

</html>