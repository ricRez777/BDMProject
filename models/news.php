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
            $query = "CALL news_SP($this->id_News, '$this->title', '$this->description', '$this->textNews', $this->eventDate, $this->publicationDate, '$this->location', '$this->keywords', '$this->statusNews', $this->front, 1, $this->id_Section, $this->id_Use, 'UPDATE')";
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
            $query = "CALL news_SP($this->id_News, '', '', '', null, null, '', '', '$this->statusNews', 0, 1, 0, 0, 'CHANGE_STATUS')";
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

        /*Mostrar una sola noticia terminada*/
        public function get_Finished(){
            $this->objConection->conexion();
            $query = "CALL news_SP($this->id_News, '', '', '', null, null, '', '', '', 0, 0, 0, 0, 'SELECT_FINISHED');";
            $resultado = $this->objConection->cone->query($query);
            while($row = $resultado->fetch_assoc()){ ?>

                <div class="containerNews">
                    <form action="" method="post">
                        <h1><?php echo $row['title']; ?></h1>
                        <p><?php echo $row['descriptionNews']; ?></p>
                        <br>
                        <p><strong>Location: </strong><?php echo $row['location']; ?></p>
                        <p><strong>Event date: </strong><?php echo $row['eventDate']; ?></p>
                        <p><strong>Section: </strong><?php echo $row['nameSection']; ?></p>
                        <br>
                        <p><strong>Choose the start image:</strong></p>

                        <!-- -------------------------------------  -->
                        <?php 
                            $this->objImage->get_All_Images_Finished();
                        ?>
                        <!-- -------------------------------------  -->
                        <br>
                        <p><?php echo $row['textNews']; ?></p>
                        <br>
                        <p><strong>Video to show: </strong></p>
                        
                        <!-- -------------------------------------- -->
                        <?php 
                            $this->objVideo->get_All_Videos_Finished();
                        ?>
                        <!-- -------------------------------------- -->
                        <br> <br>
                        <p><strong>Edit by: </strong><?php echo $row['firm']; ?></p>
                        <br>
                        <hr>
                        <br>
                        <input style="width:10%; float:right; margin-right:5%;" type="submit" class="btn-Primary" value="Publish">
                        <br><br><br><br>
                    </form>
                </div>

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


    }

?>