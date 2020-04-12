<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin dashboard</title>
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
            <?php include("components/sidebar.php"); ?>
        </div>

        <div class="content-area">

            <div class="container">
                <?php
                include("components/maincategories.php");
            ?>
            </div>

            <!-- Tab links -->
            <div class="tab">
                <button class="tablinks" onclick="openTab(event, 'Edition')" id="defaultOpen">News finished</button>
                <button class="tablinks" onclick="openTab(event, 'Users')">Users</button>
                <button class="tablinks" onclick="openTab(event, 'Sections')">Sections</button>
            </div>

            <!-- Tab content -->
            <div id="Edition" class="tabcontent" style="display:block">
                <article class="row article-Dashboard">
                    <a href="news_in_edition.php">
                        <h3>News name</h3>
                    </a>
                    <p><span><strong>Description: </strong></span>Lorem ipsum dolor sit amet consectetur
                        adipisicing
                        elit. Description of the news</p>
                    <p><span><strong>Location: </strong></span> Apodaca, Nuevo León</p>

                    <form action="" style="width:50%;" method="post">
                        <input type="text" hidden name="idNew">
                        <input type="submit" class="btn-Primary" value="Confirm">
                    </form>
                    <br>
                </article>
                <hr>
            </div>

            <div id="Users" class="tabcontent">
                <article class="row article-Dashboard">
                    <a href="">
                        <h3>News name Finished</h3>
                    </a>
                    <p><span><strong>Description: </strong></span>Lorem ipsum dolor sit amet consectetur
                        adipisicing
                        elit. Description of the news</p>
                    <p><span><strong>Location: </strong></span> Apodaca, Nuevo León</p>
                    <br>
                </article>
                <hr>
            </div>

            <div id="Sections" class="tabcontent">
                <article class="row article-Dashboard">
                    <a href="">
                        <h3>News name Published</h3>
                    </a>
                    <p><span><strong>Description: </strong></span>Lorem ipsum dolor sit amet consectetur
                        adipisicing
                        elit. Description of the news</p>
                    <p><span><strong>Location: </strong></span> Apodaca, Nuevo León</p>
                    <br>
                </article>
                <hr>
            </div>
        </div>
    </div>
</body>

</html>