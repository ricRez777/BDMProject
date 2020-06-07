<?php 

    require_once "conection.php";

    class image{

        private $id_image;
        private $image;
        private $cover;
        private $id_New;

        /*Constructor*/
        function __construct($id_imageP, $imageP, $coverP, $id_newP){
            
            $this->id_image = $id_imageP;
            $this->image = $imageP;
            $this->cover = $coverP;
            $this->id_New = $id_newP;

            $this->objConection = new Conection();
        }

        /*insertar imagen*/
        public function Insert_Image(){

            $this->objConection->conexion();
            $query = "CALL image_SP(0, '$this->image', 0, 1, $this->id_New, 'INSERT')";
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
        public function Update_Image(){
            $this->objConection->conexion();
            $query = "CALL image_SP($this->id_image, '$this->image', $this->cover, 0, 0, 'UPDATE')";
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

        /*Obtener la ultima noticia insertada*/
        public function Last_Inserted(){
            $this->objConection->conexion();
			$query = "CALL image_SP(0, null, 0, 0, 0, 'LAST_INSERTED')";
			$resultado = $this->objConection->cone->query($query);

			$fila = $resultado->fetch_assoc();
			if($resultado->num_rows > 0){

                $this->id_New = $fila['id_News'];

				$this->objConection->disconnect();
				return true;
			}
        }

        /*Obtener todas las imagenes para elegir la principal*/
        public function get_All_Images_Finished(){
            $this->objConection->conexion();
            $queryImg = "CALL image_SP(0, null, 0, 0, $this->id_New, 'SELECT');";
            $resultadoImg = $this->objConection->cone->query($queryImg);
            while($rowImg = $resultadoImg->fetch_assoc()){ ?>

                <input type="radio" name="imageCover" value="<?php echo $rowImg['id_image']; ?>">
                <label for="idImage"> 
                    <img src="<?php echo "controllers/" . $rowImg['image'];?>" width=100 >
                </label>
                <?php
            }

        }

        /*SET*/
        public function setIdImage($id_imageP){
            $this->id_image = $id_imageP;
        }

        public function setImage($imageP){
            $this->image = $imageP;
        }

        public function setCover($coverP){
            $this->cover = $coverP;
        }

        public function setIdNew($id_newP){
            $this->id_newP = $id_newP;
        }

        /*GET*/

        public function getIdImage(){
            return $this->id_image;
        }

        public function getImage(){
            return $this->image;
        }

        public function getCover(){
            return $this->cover;
        }

        public function getIdNew(){
            return $this->id_New;
        }
    }


?>