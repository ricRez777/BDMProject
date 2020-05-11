<?php 

    class Conection{
        private $Server;
        private $Use;
        private $NombreDB;
        private $Pass;

        public $cone;

        function __construct(){
            $this->Server = "localhost";
            $this->Use = "root";
            $this->Pass = "";
            $this->NombreDB = "noticiasdb";
        }

        function conexion(){
            try{
                $this->cone = new mysqli($this->Server, $this->Use, $this->Pass, $this->NombreDB);
                if ($this->cone->connect_errno) {
                    echo "Failed to connect to MySQL: " . $this->cone->connect_error;
                    exit();
                  }
                  else{
                      //echo "conection success";
                  }
            }
            catch(Exception $e){
                echo "ERROR";
            }
        }

        function disconnect(){
            $this->cone->close();
            //echo "conection close";
        }

    }
?>