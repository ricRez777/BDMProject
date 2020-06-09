<?php 

    require_once "conection.php";

    class like{
        /*Atributos*/
        private $id_like;
        private $status_like;
        private $id_Use;
        private $id_News;

        private $objConection;

        /*Constructor*/
        function __construct($id_likeP, $status_likeP, $id_Use, $id_News){
            
            $this->id_like = $id_likeP;
            $this->status_like = $status_likeP;
            $this->id_Use = $id_Use;
            $this->id_News = $id_News;

            $this->objConection = new Conection();
        }

        /*Insert del like de la noticia*/
        public function Insert_Like(){
            $this->objConection->conexion();
            $query = "CALL like_SP(0, 1, $this->id_Use, $this->id_News, 'INSERT');";
            $resultado = $this->objConection->cone->query($query);
            if($resultado){
                $this->objConection->disconnect();
                echo "SI se dio like";
				return true; 
			}
			else{
                $this->objConection->disconnect();
                echo "NO se pudo dar like";
				return false; 	
			}
        }

        /*Cambiamos el estado del like*/
        public function Change_Like(){
            $this->objConection->conexion();
            $query = "CALL like_SP($this->id_like, $this->status_like, 0, 0, 'LIKE');";
            $resultado = $this->objConection->cone->query($query);
            if($resultado){
                $this->objConection->disconnect();
                echo "SI se cambio el like";
				return true; 
			}
			else{
                $this->objConection->disconnect();
                echo "NO se pudo cambiar el like";
				return false; 	
			}
        }

        /*Verificamos si el usuario ya dio like anteriormente*/
        public function Select_Like(){
            $this->objConection->conexion();
            $query = "CALL like_SP(0, 0, $this->id_Use, $this->id_News, 'SELECT');";
            $resultado = $this->objConection->cone->query($query);
            $fila = $resultado->fetch_assoc();
            if($resultado->num_rows > 0){
                $this->id_like = $fila['id_like'];
                $this->status_like = $fila['status_like'];
                return true;
            }
            else{
                return false;
            }
        }

        /*Obtenemos el numero de likes por noticias*/
        public function Count_Like(){
            $this->objConection->conexion();
            $query = "CALL like_SP(0, 0, 0, $this->id_News, 'COUNT_LIKE');";
            $resultado = $this->objConection->cone->query($query);
            $fila = $resultado->fetch_assoc();
            if($resultado->num_rows > 0){
                $NumberLikes = $fila['NumLike'];
                return $NumberLikes;
            }
            else{
                return 0;
            }
        }

        /*GET*/
        public function getIdLike(){
            return $this->id_like;
        }
        public function getStatusLike(){
            return $this->status_like;
        }
        public function getIdUse(){
            return $this->id_Use;
        }
        public function getIdNews(){
            return $this->id_News;
        }
    }


?>