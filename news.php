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
        
            <div class="containerNews">
                <div>
                    <h1>Titulo de la noticia</h1>
                    <p>
                        Description of the News. Lorem ipsum dolor sit amet consectetur adipisicing elit.
                    </p>
                    <p><strong>Location: </strong>México city</p>
                    <p><strong>Event date: </strong>03/22/2020</p>

                    <?php include("components/slider.php"); ?>

                    <p>
                        El secretario de Salud de Nuevo León, Manuel de la O Cavazos, informó que ya suman 25
                        casos de coronavirus en Nuevo León de los cuáles uno fue de contagio.
                    </p>
                    <p>
                        De la O Cavazos informó que el caso de contagio se dio a un chofer de uno de los
                        pacientes que habían sido confirmados días antes.
                    </p>
                    <p>
                        "Entre estos pacientes que tenemos, un paciente fue contacto, el chofer de una persona
                        que dio caso positivo es el que tiene contagio de esta enfermedad.
                    </p>
                    <p>
                        "Son el total 145 casos: 25 casos confirmados, 85 negativos y 35 sospechosos", dijo De
                        la O".
                        Los primeros 14 casos son personas de San Pedro, los cinco anunciados el pasado miércoles
                        son de Monterrey y estos últimos de Monterrey, Apodaca, Santa Catarina y San Pedro.
                    </p>
                    <p>
                        Con esto, el estado pasa a la fase dos que son contagios locales y comunitarios aunque
                        desde hace días ya se habían tomado medidas de esa fase como suspender
                        actividades escolares.
                    </p>
                    <p>
                        La edad promedio de todos los infectados, dijo el funcionario es de 41 años y 76%
                        son hombres.
                    </p>
                    <video src="img/videoExample.mp4" width="700" controls></video>
                    <p><strong>Publication date: </strong>03/22/2020</p>
                    <p><strong>Edit by: </strong>El MERO ÑERO</p>
                    <?php include("components/comments.php") ?>
                </div>
                <?php include("components/breakingNews.php") ?>
            </div>
        </div>
    </div>
</body>

</html>