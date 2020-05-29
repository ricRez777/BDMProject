<?php 

    require_once "conection.php";
    
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
        }

        /*registro de noticias*/
        public function Insert_News(){
            $this->objConection->conexion();
            $query = "CALL news_SP(0, '$this->title', '$this->description', '$this->textNews', '$this->eventDate', '$this->publicationDate', '$this->location', '$this->keywords', '$this->statusNews', 1, 1, $this->id_Section, $this->id_Use, 'INSERT')";
            $resultado = $this->objConection->cone->query($query);
            if($resultado){
                $this->objConection->disconnect();
                echo "SI se inserto";
				return true; 
			}
			else{
                $this->objConection->disconnect();
                echo "NO se inserto";
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


    }

?>