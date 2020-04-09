<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Drafting</title>
    <link rel="stylesheet" href="css/style.css">
    <link href="https://fonts.googleapis.com/css?family=Raleway&display=swap" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"
        integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <script src="js/jquery-3.4.1.min.js"></script>
    <script src="js/main.js"></script>
</head>

<body>
    <div class="container">
        <?php include("components/sidebar.php") ?>
        <div>
            <?php 
                include("components/header.php");
                include("components/maincategories.php");
            ?>
            <form class="formRegisterNews" action="" Method="Post">
                <div class="divInputs">
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

                    <label for="images">Images</label>
                    <input type="file" name="images" class="formText">

                    <label for="videos">Videos</label>
                    <input type="file" name="videos" class="formText">
                    <input type="submit" value="Save draft" class="btn-Secondary">
                    <br>
                    <input type="submit" value="Send to admin" class="btn-Secondary">

                </div>
                <div class="divInputs">
                    <label for="txtDrafting">Drafting</label>
                    <textarea name="txtDrafting" id="" cols="60" rows="35" placeholder="Drafting..."></textarea>
                </div>
            </form>

            <?php include("components/footer.php") ?>
        </div>
    </div>
</body>

</html>