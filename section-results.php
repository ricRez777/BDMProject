<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Results-Section</title>
    <link rel="stylesheet" href="css/style.css">
    <link href="https://fonts.googleapis.com/css?family=Raleway&display=swap" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <script src="js/jquery-3.4.1.min.js"></script>
    <script src="js/main.js"></script>
</head>
<body>
    <?php include("components/header.php"); ?>
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
            <h3>Name Section</h3>
            <section class="containerNewsPrev">
                <article class="NewsPrev">
                    <a href="news.php"><img src="img/newsPrev.jpg" width="250" alt="no image"></a>
                    <a href="news.php">
                        <h3>Noticia</h3>
                    </a>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptate accusamus hic ipsum inventore
                        quasi iusto nam fuga velit nisi, veritatis minus, ab consequatur beatae nesciunt. Natus
                        obcaecati
                        vel consectetur est.</p>
                </article>
                <article class="NewsPrev">
                    <a href="news.php"><img src="img/newsPrev.jpg" width="250" alt="no image"></a>
                    <a href="news.php">
                        <h3>Noticia</h3>
                    </a>
                    <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Molestiae et maxime itaque eum numquam
                        quis
                        velit id, porro recusandae. Ullam labore illum minima sequi dolor itaque vel ex tempore
                        architecto.
                    </p>
                </article>
                <article class="NewsPrev">
                    <a href=""><img src="img/newsPrev.jpg" width="250" alt="no image"></a>
                    <a href="">
                        <h3>Noticia</h3>
                    </a>
                    <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Nihil, corporis sapiente. Est
                        dignissimos
                        ut odio nulla eos a hic exercitationem, doloremque adipisci doloribus perspiciatis at quaerat
                        vel,
                        cupiditate ipsa. Vel.</p>
                </article>
                <article class="NewsPrev">
                    <a href=""><img src="img/newsPrev.jpg" width="250" alt="no image"></a>
                    <a href="">
                        <h3>Noticia</h3>
                    </a>
                    <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Cum quo delectus provident? Magni est
                        ipsam, delectus unde sit rerum corporis aliquam architecto omnis placeat numquam iure cupiditate
                        ab
                        libero dicta.</p>
                </article>
                <article class="NewsPrev">
                    <a href=""><img src="img/newsPrev.jpg" width="250" alt="no image"></a>
                    <a href="">
                        <h3>Noticia</h3>
                    </a>
                    <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Nihil, corporis sapiente. Est
                        dignissimos
                        ut odio nulla eos a hic exercitationem, doloremque adipisci doloribus perspiciatis at quaerat
                        vel,
                        cupiditate ipsa. Vel.</p>
                </article>
                <article class="NewsPrev">
                    <a href=""><img src="img/newsPrev.jpg" width="250" alt="no image"></a>
                    <a href="">
                        <h3>Noticia</h3>
                    </a>
                    <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Cum quo delectus provident? Magni est
                        ipsam, delectus unde sit rerum corporis aliquam architecto omnis placeat numquam iure cupiditate
                        ab
                        libero dicta.</p>
                </article>
            </section>

        </div>
    </div>
</body>
</html>