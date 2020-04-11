<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Drafting</title>
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
            <?php include("components/sidebar.php"); ?>
        </div>
        
        <div class="content-area">

            <div class="container">
                <?php 
                    include("components/maincategories.php");
                ?>
            </div>
            
            <section id="Images" class="images-cards">
                <form action="" method="post" class="formRegisterNews" enctype="multipart/form-data">
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
                        <select name="cmbSection" id="" class="formText">
                            <option value="">Deportes</option>
                            <option value="">Politica</option>
                        </select>

                        <label for="images[]">Images</label>
                        <div class="row-container">
                            <div id="add-photo-container">
                                <div class="add-new-photo first" id="add-photo">
                                    <span><i class="icon-camera"></i></span>
                                </div>
                                <input type="file" multiple id="add-new-photo" name="images[]">
                            </div>
                        </div>

                        <label for="videos">Videos</label>
                        <input type="file" name="videos[]" multiple class="formText">

                    </div>
                    <div class="divInputs">
                        <label for="txtDrafting">Drafting</label>
                        <textarea name="txtDrafting" id="" cols="60" rows="35" placeholder="Drafting..."></textarea>
                        <br>
                        <input type="submit" name="save-draft" value="Save draft" class="btn-Secondary">
                        <br>
                        <input type="submit" name="finish" value="Finish" class="btn-Secondary">
                    </div>
                </form>
            </section>
        </div>
    </div>
    <script src="js/modal.js"></script>
    <script src="js/functions.js"></script>
    <script src="js/scripts.js"></script>
</body>

</html>