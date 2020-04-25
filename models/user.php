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
            
            $this->id_USe = $id_UseP;
            $this->type_use = $type_useP;
            $this->email = $emailP;
            $this->pass = $passP;
            $this->nameComplate = $nameComplateP;
            $this->$phone = $phoneP;
            $this->profilePicture = $profilePictureP;
            $this->firm = $firmP;

            $this->objConection = new Conection();
        }

        /*registro de usuarios*/
        function InsertUser(){
            $this->objConection->conexion();
            $query = "CALL usuarios_SP(0, '$this->type_use', '$this->email', '$this->pass', '$this->nameComplate', '$this->phone', $this->profilePicture, '$this->firm', true, 'INSERT')";
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



        /*Get de los atributos*/
        function getIdUse(){
            return $this->id_Use;
        }
        function getType_use(){
            return $this->type_use;
        }
        function getEmail(){
            return $this->email;
        }
        function getPass(){
            return $this->pass;
        }
        function getnameComplate(){
            return $this->nameComplate;
        }
        function getPhone(){
            return $this->phone;
        }
        function getProfilePicture(){
            return $this->profilePicture;
        }
        function getFirm(){
            return $this->firm;
        }


    }


?>