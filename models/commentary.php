<?php
    require_once "conection.php";

    class commentary{

        private $id_Commentary;
        private $commentary;
        private $id_Use;
        private $id_News;

        //Constructor
        function __construct($id_CommentaryP, $commentaryP, $id_UseP, $id_NewsP){

            $this->id_Commentary = $id_CommentaryP;
            $this->commentary = $commentaryP;
            $this->id_Use = $id_UseP;
            $this->id_News = $id_NewsP;

            $this->objConection = new Conection();
        }

        //Insertar comentario
        public function Insert_Commnetary(){
            $this->objConection->conexion();
            $query = "CALL commentary_SP(0, '$this->commentary', $this->id_Use, $this->id_News, 'INSERT');";
            $resultado = $this->objConection->cone->query($query);
            if($resultado){
                $this->objConection->disconnect();
                echo "SI se inserto el comentario <br>";
				return true; 
			}
			else{
                $this->objConection->disconnect();
                echo "NO se inserto el comentario <br>";
				return false; 	
			}
        }

        //Eliminar comentario
        public function Delete_Commnetary(){
            $this->objConection->conexion();
            $query = "CALL commentary_SP($this->id_Commentary, '', 0, 0, 'DELETE');";
            $resultado = $this->objConection->cone->query($query);
            if($resultado){
                $this->objConection->disconnect();
                echo "SI se elimino el comentario <br>";
				return true; 
			}
			else{
                $this->objConection->disconnect();
                echo "NO se elimino el comentario <br>";
				return false; 	
			}
        }

        //Obtener todos los comentarios
        public function Get_All_Commentary($idJournalist, $idUseLogeado){
            $this->objConection->conexion();
            $query = "CALL commentary_SP(0, '', 0, $this->id_News, 'ALL_BY_NEWS');";
            $resultado = $this->objConection->cone->query($query);
            while($row = $resultado->fetch_assoc()){ ?>

                <div class="commentary">
                    <p><strong><?php echo $row['nameComplete']; ?></strong></p>
                    <p><?php echo $row['commentary']; ?></p>
                    <?php 
                        if($idJournalist == $idUseLogeado){
                            ?>
                                <form action="controllers/commentary_delete.php" method="POST">
                                    <input type="text" hidden name="idNews" value="<?php echo $this->id_News; ?>">
                                    <input type="text" hidden name="idCommentary" value="<?php echo $row['id_commentary']; ?>">
                                    <input type="submit" class="btn-Primary" value="Delete">
                                </form>       
                            <?php
                        }
                    ?>
                    <br>
                    <hr>
                </div>

            <?php
            }
        }

    }

?>