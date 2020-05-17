<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin dashboard</title>
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
            <?php include("components/sidebar_admin.php"); ?>
        </div>

        <div class="content-area">

            <div class="container">
                <?php
                include("components/maincategories.php");
            ?>
            </div>

            <!-- Tab links -->
            <div class="tab">
                <button class="tablinks" onclick="openTab(event, 'Finished')" id="defaultOpen">News finished</button>
                <button class="tablinks" onclick="openTab(event, 'Users')">Users</button>
                <button class="tablinks" onclick="openTab(event, 'Sections')">Sections</button>
            </div>

            <!-- Tab content -->
            <div id="Finished" class="tabcontent" style="display:block">
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
                    <form action="" style="width:50%;" method="post">
                        <input type="text" hidden name="idNew">
                        <input type="submit" class="btn-Primary" value="Refuse">
                    </form>
                
                    <br>
                </article>
                <hr>

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
                    <form action="" style="width:50%;" method="post">
                        <input type="text" hidden name="idNew">
                        <input type="submit" class="btn-Primary" value="Refuse">
                    </form>
                    <br>
                </article>
                <hr>
            </div>

            <div id="Users" class="tabcontent">
                <div class="container-row">
                    <form class="formRegisterJournalist" action="controllers/user_insert.php" Method="Post" enctype="multipart/form-data">
                        <div class="divInputs">
                            <h1>Register Journalist</h1>

                            <label for="Name" class="formLabel">Name</label>
                            <input type="text" name="Name" placeholder="Name" class="formText">

                            <label for="LastName" class="formLabel">Last Name</label>
                            <input type="text" name="LastName" placeholder="Last Name" class="formText">

                            <label for="Phone" class="formLabel">Phone</label>
                            <input type="number" name="Phone" placeholder="Phone" class="formText">

                            <label for="Firm" class="formLabel">Firm</label>
                            <input type="text" name="Firm" placeholder="Firm" class="formText">
                            
                            <label for="Email" class="formLabel">E-mail</label>
                            <input type="e-mail" name="Email" placeholder="Email" class="formText">
                            
                            <label for="Pass" class="formLabel">Password</label>
                            <input type="password" name="Pass" placeholder="Password" class="formText">

                            <label for="Role" class="formLabel">Role</label>
                            <select name="Role" class="formText">
                                <option value="ADMIN">Admin</option>
                                <option value="JOURNALIST">Journalist</option>
                            </select>
                            
                            <section id="Images" class="images-cards">
                                <label for="image">Profile Picture</label>
                                <div class="row-container">
                                    <div id="add-photo-container">
                                        <div class="add-new-photo first" id="add-photo">
                                            <span><i class="icon-camera"></i></span>
                                        </div>
                                        <input type="file" id="add-new-photo" name="image">
                                    </div>
                                </div>
                            </section>

                            <input type="submit" value="Register now!" class="btn-Secondary">
                        </div>
                    </form>

                    <div class="list-user">
                        <h3>Registered users:</h3>
                        <br>
                        <article class="row article-Dashboard">
                            <h3>user@dominio.com</h3>
                            <p><span><strong>Firm: </strong></span>Lolo el de la guitarra</p>
                            <p><span><strong>Nombre: </strong></span>Miranda guitarra loca</p>
                            <form action="" style="width:100%;" method="post">
                            <input type="submit" class="btn-Primary" value="Delete">
                            </form>
                            <br>
                        </article>
                        <hr>
                        <article class="row article-Dashboard">
                            <h3>user@dominio.com</h3>
                            <p><span><strong>Firm: </strong></span>Lolo el de la guitarra</p>
                            <p><span><strong>Nombre: </strong></span>Miranda guitarra loca</p>
                            <form action="" style="width:100%;" method="post">
                            <input type="submit" class="btn-Primary" value="Delete">
                            </form>
                            <br>
                        </article>
                        <hr>
                    </div>
                    
                </div>
            </div>

            <div id="Sections" class="tabcontent">
                <div class="container-row">
                    <div class="container-sectionform">
                        <form class="formSection" action="" Method="Post">
                            <div class="divInputs">
                                <h1>Register Section</h1>

                                <label for="Section" class="formLabel">Name Section</label>
                                <input type="text" name="Section" placeholder="Name Section" class="formText">
                                
                                <div>
                                    <label for="sectionFront">Will this section be one of the main ones?</label>
                                    <input name="sectionFront" type="checkbox">
                                </div>
                                <br>
                                <label for="Colour" class="formLabel">Colour</label>
                                <input type="color" name="Colour" value="#DC8516" class="formText">
                                <br>

                                <input type="submit" value="Register now!" class="btn-Secondary">
                                
                            </div>
                        </form>
                        <form class="formSection" action="" Method="Post">
                            <div class="divInputs">
                                <h1>Modify Section</h1>

                                <label for="Section" class="formLabel">Name Section</label>
                                <select name="Section" class="formText">
                                    <option value="idSection">Section#1</option>
                                    <option value="idSection">Section#2</option>
                                    <option value="idSection">Section#3</option>
                                </select>
                                
                                <div>
                                    <label for="sectionFront">Will this section be one of the main ones?</label>
                                    <input name="sectionFront" type="checkbox">
                                </div>
                                <br>
                                <label for="Colour" class="formLabel">Colour</label>
                                <input type="color" name="Colour" value="#DC8516" class="formText">
                                <br>

                                <input type="submit" value="Modify" class="btn-Secondary">
                                
                            </div>
                        </form>
                    </div>

                    <div class="list-user">
                        <h3>Registered sections:</h3>
                        <br>
                        <article class="row article-Dashboard">
                            <h3>Name section</h3>
                            <p><span><strong>Colour: </strong></span><div style="background-color: #DC8516;">#DC8516</div></p>
                            <form action="" style="width:100%;" method="post">
                                <br>
                                <input type="submit" class="btn-Primary" value="Delete">
                            </form>
                            <br>
                        </article>
                        <hr>

                        <article class="row article-Dashboard">
                            <h3>Name section</h3>
                            <p><span><strong>Colour: </strong></span><div style="background-color: #DC8516;">#DC8516</div></p>
                            <form action="" style="width:100%;" method="post">
                                <br>
                                <input type="submit" class="btn-Primary" value="Delete">
                            </form>
                            <br>
                        </article>
                        <hr>
                    </div>
                </div>
            </div>


        </div>
    </div>
    <script src="js/modal.js"></script>
    <script src="js/functions.js"></script>
    <script src="js/scripts.js"></script>
</body>

</html>