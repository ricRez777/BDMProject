<?php 

    require_once "conection.php";

    class video{

        private $id_video;
        private $video;
        private $cover;
        private $id_New;

        /*Constructor*/
        function __construct($id_videoP, $videoP, $coverP, $id_newP){
            
            $this->id_video = $id_videoP;
            $this->video = $videoP;
            $this->cover = $coverP;
            $this->id_new = $id_newP;

            $this->objConection = new Conection();
        }

        /*insertar video*/
        public function Insert_Video(){
            $this->objConection->conexion();
            $query = "CALL video_SP(0, '$this->video', 0, 1, $this->id_New, 'INSERT')";
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

        /*modificacion de imagenes*/
        public function Update_Video(){
            $this->objConection->conexion();
            $query = "CALL video_SP($this->id_video, '$this->video', $this->cover, 0, 0, 'UPDATE')";
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

        /*Asignamos el video que se mostrara en la noticia*/
        public function Cover_Video(){
            $this->objConection->conexion();
            $query = "CALL video_SP($this->id_video, '', $this->cover, 0, 0, 'COVER')";
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

        /*Obtenemos el video que se mostrara en la noticia publicada*/
        public function get_Video_Published(){
            $this->objConection->conexion();
            $queryVid = "CALL video_SP(0, null, 0, 0, $this->id_new, 'SELECT_SHOW');";
            $resultadoVid = $this->objConection->cone->query($queryVid);
            while($rowVid = $resultadoVid->fetch_assoc()){ 
                $this->video = $rowVid['video'];
            }
        }

        /*Metodo para taer la ultima noticia insertada*/
        public function Last_Inserted(){
            $this->objConection->conexion();
			$query = "CALL video_SP(0, null, 0, 0, 0, 'LAST_INSERTED')";
			$resultado = $this->objConection->cone->query($query);

			$fila = $resultado->fetch_assoc();
			if($resultado->num_rows > 0){

                $this->id_New = $fila['id_News'];

				$this->objConection->disconnect();
				return true;
			}
        }

        /*Obtener todas los videos para elegir el principal*/
        public function get_All_Videos_Finished(){
            $this->objConection->conexion();
            $queryVid = "CALL video_SP(0, null, 0, 0, $this->id_new, 'SELECT');";
            $resultadoVid = $this->objConection->cone->query($queryVid);
            while($rowVid = $resultadoVid->fetch_assoc()){ ?>

                <input type="radio" name="VideoCover" value="<?php echo $rowVid['id_video']; ?>">
                <label>
                    <video controls width="300" height="150" src="<?php echo "controllers/" . $rowVid['video'];?>"></video>
                </label>
                <?php
            }
        }

        /*SET*/
        public function setIdVideo($id_videoP){
            $this->id_video = $id_videoP;
        }

        public function setVideo($videoP){
            $this->video = $videoP;
        }

        public function setCover($coverP){
            $this->cover = $coverP;
        }

        public function setIdNew($id_newP){
            $this->id_New = $id_newP;
        }

        /*GET*/
        public function getIdVideo(){
            return $this->id_video;
        }

        public function getVideo(){
            return $this->video;
        }

        public function getCover(){
            return $this->cover;
        }

        public function getIdNew(){
            return $this->id_New;
        }
    }


?>