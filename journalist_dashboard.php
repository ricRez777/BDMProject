<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Journalist dashboard</title>
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
            <?php include("components/sidebar_journalist.php"); ?>
        </div>
        
        <div class="content-area">

        <div class="container">
            <?php
                include("components/maincategories.php");
            ?>
        </div>

            <!-- Tab links -->
            <div class="tab">
                <button class="tablinks" onclick="openTab(event, 'Edition')" id="defaultOpen">Edition</button>
                <button class="tablinks" onclick="openTab(event, 'Finished')">Finished</button>
                <button class="tablinks" onclick="openTab(event, 'Published')">Published</button>
                <button class="tablinks" onclick="openTab(event, 'Write')">Write</button>
            </div>

            <!-- Tab content -->
            <div id="Edition" class="tabcontent">
                <article class="row article-Dashboard">
                    <a href="">
                        <h3>News name</h3>
                    </a>
                    <p><span><strong>Description: </strong></span>Lorem ipsum dolor sit amet consectetur
                        adipisicing
                        elit. Description of the news</p>
                    <p><span><strong>Location: </strong></span> Apodaca, Nuevo León</p>
                    <div class="row">
                        <button class="btn-Primary" onclick="location.href='news_edit.php'" >Edit</button>&nbsp;&nbsp;
                        <button class="btn-Primary">Finish</button>
                    </div>
                    <br>
                </article>
                <hr>
                <article class="row article-Dashboard">
                    <a href="">
                        <h3>News name</h3>
                    </a>
                    <p><span><strong>Description: </strong></span>Lorem ipsum dolor sit amet consectetur
                        adipisicing
                        elit. Description of the news</p>
                    <p><span><strong>Location: </strong></span> Apodaca, Nuevo León</p>
                    <div class="row">
                        <button class="btn-Primary" onclick="location.href='news_edit.php'">Edit</button>&nbsp;&nbsp;
                        <button class="btn-Primary">Finish</button>
                    </div>
                    <br>
                </article>
                <hr>
            </div>

            <div id="Finished" class="tabcontent">
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

            <div id="Published" class="tabcontent">
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

            <div id="Write" class="tabcontent" style="display:block">
                <section id="Images" class="images-cards">
                    <form action="controllers/news_insert.php" method="post" class="formRegisterNews" enctype="multipart/form-data">
                        <div class="divInputs">
                            <h2>Writing the news...</h2><br>
                            <label for="txtTitle">Title</label>
                            <input type="text" name="txtTitle" placeholder="Title" class="formText">

                            <label for="txtDescription">Description</label>
                            <input type="text" name="txtDescription" placeholder="Description" class="formText">

                            <label for="eventDate">Event date</label>
                            <input type="datetime-local" name="eventDate" class="formText">

                            <label for="txtLocation">Location</label>
                            <input type="text" name="txtLocation" placeholder="Location" class="formText">

                            <label for="publicationDate">Publication Date</label>
                            <input type="date" name="publicationDate" class="formText">

                            <label for="txtKeywords">Keywords</label>
                            <input type="text" name="txtKeywords" placeholder="Keywords" class="formText">

                            <label for="cmbSection">Section</label>
                            <?php
                                $objSections = new section('', '', '', '');
                                $objSections->get_All_Sections_Combo();
                            ?>

                            <!--<label for="images[]">Images</label>
                            <div class="row-container">
                                <div id="add-photo-container">
                                    <div class="add-new-photo first" id="add-photo">
                                        <span><i class="icon-camera"></i></span>
                                    </div>
                                    <input type="file" multiple id="add-new-photo" name="images[]">
                                </div>
                            </div>-->

                            <label for="videos">Videos</label>
                            <input type="file" name="videos[]" multiple class="formText">

                        </div>
                        <div class="divInputs">
                            <label for="txtDrafting">Drafting</label>
                            <textarea name="txtDrafting" id="" cols="60" rows="35" placeholder="Drafting..."></textarea>
                            <br>
                            <input type="submit" name="draft" value="Save draft" class="btn-Secondary">
                            <br>
                            <input type="submit" name="admin" value="Send to admin" class="btn-Secondary">
                        </div>
                    </form>
                </section>
            </div>
        </div>
    </div>

    <script src="js/modal.js"></script>
    <script src="js/functions.js"></script>
    <script src="js/scripts.js"></script>
</body>

</html>