<?php

    require_once "conection.php";

    class user{
        /*Elementos de la base de datos*/
        private $id_Use;
        private $type_use;
        private $email;
        private $pass;
        private $nameComplate; 
        private $phone;
        private $profilePicture; 
        private $firm;

        private $objConection;

        /*Constructor*/
        function __construct($id_UseP, $type_useP, $emailP, $passP, $nameComplateP, $phoneP, $profilePictureP, $firmP){
            
            $this->id_Use = $id_UseP;
            $this->type_use = $type_useP;
            $this->email = $emailP;
            $this->pass = $passP;
            $this->nameComplate = $nameComplateP; 
            $this->phone = $phoneP;
            $this->profilePicture = $profilePictureP;
            $this->firm = $firmP;

            $this->objConection = new Conection();
        }

        /*registro de usuarios*/
        public function Insert_User(){
            $this->objConection->conexion();
            $query = "CALL usuarios_SP(0, '$this->type_use', '$this->email', '$this->pass', '$this->nameComplate', '$this->phone', '$this->profilePicture', '$this->firm', 1, 'INSERT')";
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

        /*Select para obtener todos los periodistas*/
        public function get_All_Journalist(){
            $this->objConection->conexion();
            $query = "CALL usuarios_SP(0, '', '', '', '', '', '', '', '', 'LIST_JOURNALIST')";
            $resultado = $this->objConection->cone->query($query);
            while($row = $resultado->fetch_assoc()){
                ?>
                <article class="row article-Dashboard">
                    <h3> <?php echo $row['email']; ?> </h3>
                    <p><span><strong>Firm: </strong></span> <?php echo $row['firm']; ?> </p>
                    <p><span><strong>Name: </strong></span> <?php echo $row['nameComplete']; ?> </p>
                    <p><span><strong>Phone: </strong></span> <?php echo $row['phone']; ?> </p>
                    <form action="controllers/journalist_delete.php" style="width:100%;" method="post">
                        <input type="text" hidden name="id_Journalist" value="<?php echo $row['id_Use']; ?>">
                        <input type="submit" class="btn-Primary" value="Delete">
                    </form>
                    <br>
                </article>
                <hr>
                <?php
            }
        }

        /*modificacion de usuarios*/
        public function Update_User(){
            $this->objConection->conexion();
            $query = "CALL usuarios_SP($this->id_Use, 'JOURNALIST', '$this->email', '$this->pass', '$this->nameComplate', '$this->phone', '$this->profilePicture', '$this->firm', 1, 'UPDATE')";
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

        /*modificacion de usuarios sin cambiar la foto de perfil*/
        public function Update2_User(){
            $this->objConection->conexion();
            $query = "CALL usuarios_SP($this->id_Use, 'JOURNALIST', '$this->email', '$this->pass', '$this->nameComplate', '$this->phone', '', '$this->firm', 1, 'UPDATE2')";
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

        /*baja de usuarios*/
        public function Delete_User(){
            $this->objConection->conexion();
            $query = "CALL usuarios_SP($this->id_Use, '', '', '', '', '', null, '', true, 'DELETE')";
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

        /*Inicio de sesion*/
        public function Login_User(){
			$this->objConection->conexion();
			$query = "CALL usuarios_SP(0, '', '$this->email', '$this->pass', '', '', '', '', '', 'LOGIN')";
			$resultado = $this->objConection->cone->query($query);

			$fila = $resultado->fetch_assoc();
			if($resultado->num_rows > 0){

                $this->email = $fila['email'];
                $this->pass = $fila['pass'];
                $this->type_use = $fila['type_use'];
                $this->profilePicture = $fila['profilePicture'];
                $this->nameComplate = $fila['nameComplete'];
                $this->id_Use = $fila['id_Use'];
                $this->firm = $fila['firm'];
                $this->phone = $fila['phone'];

				$this->objConection->disconnect();
				return true;
			}
			else{
				echo "Correo: " . $this->email . "<br>";
                echo "Contraseña: " . $this->pass . "<br>";
				$this->objConection->disconnect();
				return false;
			}
		}

        /*Get de los atributos*/
        public function getIdUse(){
            return $this->id_Use;
        }
        public function getType_use(){
            return $this->type_use;
        }
        public function getEmail(){
            return $this->email;
        }
        public function getPass(){
            return $this->pass;
        }
        public function getnameComplate(){
            return $this->nameComplate;
        }
        public function getPhone(){
            return $this->phone;
        }
        public function getProfilePicture(){
            return $this->profilePicture;
        }
        public function getFirm(){
            return $this->firm;
        }


    }


?>