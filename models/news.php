<?php 

    require_once "conection.php";
    require_once "video.php";
    require_once "image.php";
    
    class news{

        private $id_News;
        private $title;
        private $description;
        private $textNews;
        private $eventDate;
        private $publicationDate;
        private $location;
        private $keywords;
        private $statusNews;
        private $front;
        private $id_Section;
        private $id_Use;
        private $firm;
        
        private $objConection;
        private $objImage;
        private $objVideo;

        /*Constructor*/
        function __construct($id_NewsP, $titleP, $descriptionP, $textNews, $eventDateP, $publicationDateP, $locationP, $keywordsP, $statusNewsP, $frontP, $id_SectionP, $id_UseP){

            $this->id_News = $id_NewsP;
            $this->title = $titleP;
            $this->description = $descriptionP;
            $this->textNews = $textNews;
            $this->eventDate = $eventDateP;
            $this->publicationDate = $publicationDateP;
            $this->location = $locationP;
            $this->keywords = $keywordsP;
            $this->statusNews = $statusNewsP;
            $this->front = $frontP;
            $this->id_Section = $id_SectionP;
            $this->id_Use = $id_UseP;

            $this->objConection = new Conection();
            $this->objImage = new image(0, null, 0, $this->id_News);
            $this->objVideo = new video(0, null, 0, $this->id_News);
        }

        /*registro de noticias*/
        public function Insert_News(){
            $this->objConection->conexion();
            $query = "CALL news_SP(0, '$this->title', '$this->description', '$this->textNews', '$this->eventDate', '$this->publicationDate', '$this->location', '$this->keywords', '$this->statusNews', 1, 1, $this->id_Section, $this->id_Use, 'INSERT')";
            $resultado = $this->objConection->cone->query($query);
            if($resultado){
                $this->objConection->disconnect();
                echo "SI se inserto <br>";
				return true; 
			}
			else{
                $this->objConection->disconnect();
                echo "NO se inserto <br>";
				return false; 	
			}
        }

        /*modificacion de noticias*/
        public function Update_News(){
            $this->objConection->conexion();
            $query = "CALL news_SP($this->id_News, '$this->title', '$this->description', '$this->textNews', '$this->eventDate', now(), '$this->location', '$this->keywords', '$this->statusNews', 0, 1, $this->id_Section, 0, 'UPDATE');";
            $resultado = $this->objConection->cone->query($query);
            if($resultado){
				$this->objConection->disconnect();
				return true; 
			}
			else{
                $this->objConection->disconnect();
                echo "No se ejecuto el query";
				return false; 	
			}
        }

        /*cambiar estatus de la noticia*/
        public function Delete_News(){
            $this->objConection->conexion();
            $query = "CALL news_SP($this->id_News, '', '', '', null, null, '', '', '', 0, 1, 0, 0, 'DELETE')";
            $resultado = $this->objConection->cone->query($query);
            if($resultado){
				$this->objConection->disconnect();
				return true; 
			}
			else{
				$this->objConection->disconnect();
				return false; 	
			}
        }

        /*cambiar estatus de la noticia*/
        public function Change_Status(){
            $this->objConection->conexion();
            $query = "CALL news_SP($this->id_News, '', '', '', null, null, '', '', '$this->statusNews', $this->front, 1, 0, 0, 'CHANGE_STATUS')";
            $resultado = $this->objConection->cone->query($query);
            if($resultado){
				$this->objConection->disconnect();
				return true; 
			}
			else{
				$this->objConection->disconnect();
				return false; 	
			}
        }

        /*Obtenemos todas las noticas que se insertaron de ultimo momento*/
        public function Breaking_News(){
            $this->objConection->conexion();
            $query = "CALL news_SP(0, '', '', '', null, null, '', '', '', 0, 1, 0, 0, 'GET_ALL_BREAKINGNEWS')";
            $resultado = $this->objConection->cone->query($query);
            while($row = $resultado->fetch_assoc()){ ?>

                <div class="NewsPrev js-carousel-item">
                    <a href="<?php echo 'news.php?idNew=' . $row['id_News'];?>"><img src="<?php echo "controllers/" . $row['image']; ?>" width="250" alt="no image"></a>
                    <a href="<?php echo 'news.php?idNew=' . $row['id_News'];?>">
                        <h3><?php echo $row['title'];?></h3>
                    </a>
                    <p><?php echo $row['descriptionNews']; ?></p>
                </div>

                <?php
            }
        }

        /*Obtenemos todas las noticas que se promocionan dentro de otra noticia*/
        public function Breaking_News_Side(){
            $this->objConection->conexion();
            $query = "CALL news_SP(0, '', '', '', null, null, '', '', '', 0, 1, 0, 0, 'GET_ALL_BREAKINGNEWS')";
            $resultado = $this->objConection->cone->query($query);
            $i = 0;
            while($row = $resultado->fetch_assoc()){ 
                if($i<4){
                ?>
                <article class="NewsPrev">
                    <a href="<?php echo 'news.php?idNew=' . $row['id_News'];?>"><img src="<?php echo "controllers/" . $row['image']; ?>" width="250" alt="no image"></a>
                    <a href="<?php echo 'news.php?idNew=' . $row['id_News'];?>">
                        <h3><?php echo $row['title'];?></h3>
                    </a>
                    <p><?php echo $row['descriptionNews']; ?></p>
                </article>

                <?php
                $i++;
                }
            }
        }

        /*Obtenemos todas las noticicas que deben aparecer en la pagina principal*/
        public function Front_News(){
            $this->objConection->conexion();
            $query = "CALL news_SP(0, '', '', '', null, null, '', '', '', 0, 1, 0, 0, 'GET_ALL_FRONTNEWS')";
            $resultado = $this->objConection->cone->query($query);
            while($row = $resultado->fetch_assoc()){ ?>

                <div class="NewsPrev js-carousel-item">
                    <a href="<?php echo 'news.php?idNew=' . $row['id_News'];?>"><img src="<?php echo "controllers/" . $row['image']; ?>" width="250" alt="no image"></a>
                    <a href="<?php echo 'news.php?idNew=' . $row['id_News'];?>">
                        <h3><?php echo $row['title'];?></h3>
                    </a>
                    <p><?php echo $row['descriptionNews']; ?></p>
                </div>

                <?php
            }
        }

        /*Obtenemos todas las noticicas por sección*/
        public function Sections_News_All(){
            $this->objConection->conexion();
            $query = "CALL news_SP(0, '', '', '', null, null, '', '', '', 0, 0, $this->id_Section, 0, 'GET_ALL_SECTIONSNEWS');";
            $resultado = $this->objConection->cone->query($query);
            while($row = $resultado->fetch_assoc()){ ?>
                <article class="NewsPrev">
                <a href="<?php echo 'news.php?idNew=' . $row['id_News'];?>"><img src="<?php echo "controllers/" . $row['image']; ?>" width="250" alt="no image"></a>
                    <a href="<?php echo 'news.php?idNew=' . $row['id_News'];?>">
                        <h3><?php echo $row['title']; ?></h3>
                    </a>
                    <p><?php echo $row['descriptionNews']; ?></p>
                </article>

                <?php
            }
        }

        /*Obtenemos todas las noticicas por sección para la pantalla principal*/
        public function Sections_News_All_Index($idSection){
            $this->objConection->conexion();
            $query = "CALL news_SP(0, '', '', '', null, null, '', '', '', 0, 0, $idSection, 0, 'GET_ALL_SECTIONSNEWS');";
            $resultado = $this->objConection->cone->query($query);
            while($row = $resultado->fetch_assoc()){ ?>
                
                <div class="NewsPrev js-carousel-item">
                    <a href="<?php echo 'news.php?idNew=' . $row['id_News'];?>"><img src="<?php echo "controllers/" . $row['image']; ?>" width="250" alt="no image"></a>
                    <a href="<?php echo 'news.php?idNew=' . $row['id_News'];?>">
                        <h3><?php echo $row['title'];?></h3>
                    </a>
                    <p><?php echo $row['descriptionNews']; ?></p>
                </div>

                <?php
            }
        }

        /*Metodo para busqueda de noticias*/
        public function search_News(){
            $this->objConection->conexion();
            $query = "CALL news_SP(0, '', '', '$this->textNews', null, null, '', '', '', 0, 0, '', 0, 'SEARCH');";
            $resultado = $this->objConection->cone->query($query);
            while($row = $resultado->fetch_assoc()){ ?>
                <article class="NewsPrev">
                <a href="<?php echo 'news.php?idNew=' . $row['id_News'];?>"><img src="<?php echo "controllers/" . $row['image']; ?>" width="250" alt="no image"></a>
                    <a href="<?php echo 'news.php?idNew=' . $row['id_News'];?>">
                        <h3><?php echo $row['title']; ?></h3>
                    </a>
                    <p><?php echo $row['descriptionNews']; ?></p>
                </article>

                <?php
            }
        }

        /*Entre un rango de fechas*/
        public function search_News_date($fecha1, $fecha2){
            $this->objConection->conexion();
            $query = "CALL news_SP(0, '', '', '$this->textNews', null, null, '', '', '', 0, 0, '', 0, 'SEARCH');";
            $resultado = $this->objConection->cone->query($query);
            while($row = $resultado->fetch_assoc()){ 
                if($row['publicationDate'] >= $fecha1 && $row['publicationDate'] <= $fecha2){
                ?>
                <article class="NewsPrev">
                <a href="<?php echo 'news.php?idNew=' . $row['id_News'];?>"><img src="<?php echo "controllers/" . $row['image']; ?>" width="250" alt="no image"></a>
                    <a href="<?php echo 'news.php?idNew=' . $row['id_News'];?>">
                        <h3><?php echo $row['title']; ?></h3>
                    </a>
                    <p><?php echo $row['descriptionNews']; ?></p>
                </article>

                <?php
                }
            }
        }

        /*Obtenemos los elementos de la noticia publicada*/
        public function get_News_Published(){
            $this->objConection->conexion();
            $query = "CALL news_SP($this->id_News, '', '', '', null, null, '', '', '', 0, 0, 0, 0, 'SELECT_PUBLISHED');";
            $resultado = $this->objConection->cone->query($query);
            while($row = $resultado->fetch_assoc()){
                $this->id_News = $row['id_News'];
                $this->title = $row['title'];
                $this->description = $row['descriptionNews'];
                $this->textNews = $row['textNews'];
                $this->eventDate = $row['eventDate'];
                $this->publicationDate = $row['publicationDate'];
                $this->location = $row['location'];
                $this->id_Section = $row['nameSection'];
                $this->id_Use = $row['id_Use'];
                $this->firm = $row['firm'];
            }
        }

        /*Mostrar todos las noticias terminadas*/
        public function get_All_Finished(){
            $this->objConection->conexion();
            $query = "CALL news_SP(0, '', '', '', null, null, '', '', '', 0, 0, 0, 0, 'SELECT_FINISHED_ALL');";
            $resultado = $this->objConection->cone->query($query);
            while($row = $resultado->fetch_assoc()){ ?>

                <article class="row article-Dashboard">
                    <h3><?php echo $row['title']; ?></h3>
                    <p><span><strong>Description: </strong></span><?php echo $row['descriptionNews']; ?></p>
                    <p><span><strong>Location: </strong></span><?php echo $row['location']; ?></p>
                    <p><span><strong>Edit by: </strong></span><?php echo $row['firm']; ?></p>
                    <form action="news_in_edition.php" style="width:50%;" method="post">
                        <input type="text" value="<?php echo $row['id_News']; ?>" hidden name="idNew">
                        <div class="row">
                            <input type="submit" class="btn-Primary" value="Check">
                        </div>
                    </form>
                    <br>   
                </article>
                <hr>

                <?php
            }
        }

        /*Mostrar todos las noticias en edición*/
        public function get_All_Edition(){
            $this->objConection->conexion();
            $query = "CALL news_SP(0, '', '', '', null, null, '', '', '', 0, 0, 0, $this->id_Use, 'SELECT_EDITION_ALL');";
            $resultado = $this->objConection->cone->query($query);
            while($row = $resultado->fetch_assoc()){ ?>

                <article class="row article-Dashboard">
                    <h3><?php echo $row['title']; ?></h3>
                    <p><span><strong>Description: </strong></span><?php echo $row['descriptionNews']; ?></p>
                    <p><span><strong>Location: </strong></span><?php echo $row['location']; ?></p>
                    <p><span><strong>Edit by: </strong></span><?php echo $row['firm']; ?></p>
                    
                    <form action="news_edit.php" style="width:50%;" method="post">
                        <input type="text" hidden value="<?php echo $row['id_News']; ?>" name="idNew">
                        <div class="row">
                            <input type="submit" class="btn-Primary" value="Edit">
                        </div>
                    </form>
                    <br>
                    <form action="controllers/news_delete.php" style="width:50%;" method="post">
                        <input type="text" hidden value="<?php echo $row['id_News']; ?>" name="idNew">
                        <div class="row">
                            <input type="submit" class="btn-Primary" value="Delete">
                        </div>
                    </form>
                    <br>   
                </article>
                <hr>

                <?php
            }
        }

        /*Mostrar todos las noticias terminadas POR USUARIO*/
        public function get_All_Finished_By_User(){
            $this->objConection->conexion();
            $query = "CALL news_SP(0, '', '', '', null, null, '', '', '', 0, 0, 0, $this->id_Use, 'SELECT_FINISHED_ALL_BY_USER');";
            $resultado = $this->objConection->cone->query($query);
            while($row = $resultado->fetch_assoc()){ ?>

                <article class="row article-Dashboard">
                    <h3><?php echo $row['title']; ?></h3>
                    <p><span><strong>Description: </strong></span><?php echo $row['descriptionNews']; ?></p>
                    <p><span><strong>Location: </strong></span><?php echo $row['location']; ?></p>
                    <p><span><strong>Edit by: </strong></span><?php echo $row['firm']; ?></p>
                    <form action="controllers/news_delete.php" style="width:50%;" method="post">
                        <input type="text" value="<?php echo $row['id_News']; ?>" hidden name="idNew">
                        <div class="row">
                            <input type="submit" class="btn-Primary" value="Delete">
                        </div>
                    </form>
                    <br>   
                </article>
                <hr>

                <?php
            }
        }

        /*Mostrar todos las noticias publicadas POR USUARIO*/
        public function get_All_Published_By_User(){
            $this->objConection->conexion();
            $query = "CALL news_SP(0, '', '', '', null, null, '', '', '', 0, 0, 0, $this->id_Use, 'SELECT_PUBLISHED_ALL_BY_USER');";
            $resultado = $this->objConection->cone->query($query);
            while($row = $resultado->fetch_assoc()){ ?>

                <article class="row article-Dashboard">
                    <h3> <a href="<?php echo 'news.php?idNew=' . $row['id_News'];?>" > <?php echo $row['title'];?> </a> </h3>
                    <p><span><strong>Description: </strong></span><?php echo $row['descriptionNews']; ?></p>
                    <p><span><strong>Location: </strong></span><?php echo $row['location']; ?></p>
                    <p><span><strong>Edit by: </strong></span><?php echo $row['firm']; ?></p>
                    <form action="" style="width:50%;" method="post">
                        <input type="text" value="<?php echo $row['id_News']; ?>" hidden name="idNew">
                        <div class="row">
                            <input type="submit" class="btn-Primary" value="Delete">
                        </div>
                    </form>
                    <br>   
                </article>
                <hr>

                <?php
            }
        }

        /*Mostrar una sola noticia terminada*/
        public function get_Finished(){
            $this->objConection->conexion();
            $query = "CALL news_SP($this->id_News, '', '', '', null, null, '', '', '', 0, 0, 0, 0, 'SELECT_FINISHED');";
            $resultado = $this->objConection->cone->query($query);
            while($row = $resultado->fetch_assoc()){ ?>

                <div class="containerNews">
                    <form action="controllers/news_post.php" method="post">
                        <h1><?php echo $row['title']; ?></h1>
                        <p><?php echo $row['descriptionNews']; ?></p>
                        <br>
                        <p><strong>Localizacioon: </strong><?php echo $row['location']; ?></p>
                        <p><strong>Fecha del evento: </strong><?php echo $row['eventDate']; ?></p>
                        <p><strong>Sección: </strong><?php echo $row['nameSection']; ?></p>
                        <br>
                        <!----------------------------------------->
                        <p><strong>Imagenes que se mostraran en la noticia:</strong></p>
                        <?php 
                            $this->objImage->get_All_Images_Finished();
                        ?>
                        <!----------------------------------------->
                        <br>
                        <p><?php echo $row['textNews']; ?></p>
                        <br>
                        <!------------------------------------------>
                        <p><strong>Elije el video que se mostrara en la noticia: </strong></p>
                        <?php 
                            $this->objVideo->get_All_Videos_Finished();
                        ?>
                        <!------------------------------------------>
                        <br> <br>
                        <p><strong>Escrito por: </strong><?php echo $row['firm']; ?></p>
                        <br>
                        <label> <strong> Esta noticia sera de las que aparecen en el inicio? </strong> </label>
                        <input name="front" type="checkbox">
                        <br>
                        <hr>
                        <br>
                        <input type="text" hidden name="id_News" value="<?php echo $row['id_News']; ?>">
                        <input style="width:10%; float:right; margin-right:5%;" type="submit" class="btn-Primary" value="Publish">
                        <br><br><br><br>
                    </form>
                </div>

                <?php
            }
        }

        /*Mostrar una sola noticia que esta en edicion*/
        public function get_Edition(){
            $idNew = $_POST['idNew'];
            $this->objConection->conexion();
            $query = "CALL news_SP($idNew, '', '', '', null, null, '', '', '', 0, 0, 0, 0, 'SELECT');";
            $resultado = $this->objConection->cone->query($query);
            while($row = $resultado->fetch_assoc()){ ?>

                <form action="controllers/news_update.php" method="post" class="formRegisterNews" enctype="multipart/form-data">
                    <div class="divInputs">
                        <h2>Writing the news...</h2><br>

                        <input type="text" hidden name="id_News" value="<?php echo $row['id_News']; ?>">

                        <label for="txtTitle">Title</label>
                        <input type="text" required name="txtTitle" placeholder="Title" class="formText" value="<?php echo $row['title']; ?>">

                        <label for="txtDescription">Description</label>
                        <input type="text" required name="txtDescription" placeholder="Description" class="formText" value="<?php echo $row['descriptionNews']; ?>">

                        <label for="eventDate">Event date</label>
                        <?php  
                            $ED = explode(" ", $row['eventDate']);
                        ?>
                        <input type="datetime-local" required name="eventDate" class="formText" value="<?php echo $ED[0] . "T" . $ED[1]; ?>">

                        <label for="txtLocation">Location</label>
                        <input type="text" required name="txtLocation" placeholder="Location" class="formText" value="<?php echo $row['location']; ?>">

                        <label for="txtKeywords">Keywords</label>
                        <input type="text" required name="txtKeywords" placeholder="Keywords" class="formText" value="<?php echo $row['keywords']; ?>">

                        <label for="cmbSection">Section</label>
                        <?php
                            $objSections = new section('', '', '', '');
                            $objSections->get_All_Sections_Combo();
                        ?>

                        <p>
                            Status: <br>
                            <?php 
                                if($row['statusNews'] == 'EDITION'){
                                    ?> 
                                        <input type="radio" checked name="status" value="EDITION">Edition
                                        <input type="radio" name="status" value="FINISHED">Finished
                                    <?php
                                }
                                else if($row['statusNews'] == 'FINISHED'){
                                    ?> 
                                        <input type="radio" name="status" value="EDITION">Edition
                                        <input type="radio" checked name="status" value="FINISHED">Finished
                                    <?php
                                }
                            ?>
                        </p>
                        
                        <br>

                    </div>
                    <div class="divInputs">
                        <label for="txtDrafting">Drafting</label>
                        <textarea name="txtDrafting" id="" required cols="60" rows="35" placeholder="Drafting..."><?php echo $row['textNews']; ?></textarea>
                        <br>
                        <input type="submit" name="admin" value="Submit" class="btn-Secondary">
                    </div>
                </form>

                <?php
            }
        }

        /*GET*/
        public function getIdNews(){
            return $this->id_News;
        }
        public function getTitle(){
            return $this->title;
        }
        public function getDescription(){
            return $this->description;
        }
        public function getTextNews(){
            return $this->textNews;
        }
        public function getEventDate(){
            return $this->eventDate;
        }
        public function getPublicationDate(){
            return $this->publicationDate;
        }
        public function getLocation(){
            return $this->location;
        }
        public function getKeywords(){
            return $this->keywords;
        }
        public function getStatusNews(){
            return $this->statusNews;
        }
        public function getIdSection(){
            return $this->id_Section;
        }
        public function getIdUse(){
            return $this->id_Use;
        }
        public function getFirm(){
            return $this->firm;
        }


    }

?>