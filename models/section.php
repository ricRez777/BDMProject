<?php 
    require_once "conection.php";

    class section{
        /*Atributos*/
        private $id_Section;
        private $name_Section;
        private $color;
        private $main;

        private $objConection;

        /*Constructor*/
        function __construct($id_SectionP, $name_SectionP, $colorP, $mainP){

            $this->id_Section = $id_SectionP;
            $this->name_Section = $name_SectionP;
            $this->color = $colorP;
            $this->main = $mainP;

            $this->objConection = new Conection();
        }

        /*Insert de secciones*/
        public function Insert_Section(){
            $this->objConection->conexion();
            $query = "CALL section_SP(0, '$this->name_Section', '$this->color', 1, $this->main, 'INSERT')";
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

        /*Update de secciones*/
        public function Update_Section(){
            $this->objConection->conexion();
            $query = "CALL section_SP($this->id_Section, '$this->name_Section', '$this->color', 1, $this->main, 'UPDATE')";
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

        /*baja de secciones*/
        public function Delete_Section(){
            $this->objConection->conexion();
            $query = "CALL section_SP($this->id_Section, '', '', '', '', 'DELETE')";
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

        /*Select para obtener todas las secciones*/
        public function get_All_Sections(){
            $this->objConection->conexion();
            $query = "CALL section_SP(0, '', '', '', '', 'ALL_SECTIONS');";
            $resultado = $this->objConection->cone->query($query);
            while($row = $resultado->fetch_assoc()){ ?>

                <article class="row article-Dashboard">
                    <h3><?php echo $row['nameSection']; ?></h3>
                    <p><span><strong>Colour: </strong></span><div style="background-color: <?php echo $row['color']; ?>;"><?php echo $row['color']; ?></div></p>
                    <?php 
                        if($row['main'] == 1){
                            echo "Section Main";
                        }
                    ?>
                    <form action="controllers/section_delete.php" style="width:100%;" method="post">
                        <br>
                        <input type="text" hidden name="id_section" value="<?php echo $row['id_Section']; ?>">
                        <input type="submit" class="btn-Primary" value="Delete">
                    </form>
                    <br>
                </article>
                <hr>

                <?php
            }
        }

        /*Select para obtener todas las secciones*/
        public function get_All_Sections_Combo(){
            $this->objConection->conexion();
            $query = "CALL section_SP(0, '', '', '', '', 'ALL_SECTIONS');";
            $resultado = $this->objConection->cone->query($query);
            ?> 
            <select name="IdSection" class="formText">
            <?php
            while($row = $resultado->fetch_assoc()){ ?>
                
                <option value="<?php echo $row['id_Section']; ?>"> <?php echo $row['nameSection']; ?> </option>

                <?php
            }
            ?></select><?php
        }

        public function get_All_Sections_Main(){
            $this->objConection->conexion();
            $query = "CALL section_SP(0, '', '', '', '', 'INDEX_SECTIONS');";
            $resultado = $this->objConection->cone->query($query);
            ?> 
            <?php
            while($row = $resultado->fetch_assoc()){ ?>
                <li><a href="<?php echo 'section-results.php?idSection=' . $row['id_Section'];?>"> <?php echo $row['nameSection']; ?> </a></li>
                <?php
            }
        }

        public function get_All_Sections_Side(){
            $this->objConection->conexion();
            $query = "CALL section_SP(0, '', '', '', '', 'ALL_SECTIONS');";
            $resultado = $this->objConection->cone->query($query);
            ?> 
            <?php
            while($row = $resultado->fetch_assoc()){ ?>
                
                <li><a href="<?php echo 'section-results.php?idSection=' . $row['id_Section'];?>"> <?php echo $row['nameSection']; ?> </a></li>

                <?php
            }
        }

        /*Get de los atributos de la clase*/
        public function getIdSection(){
            return $this->id_Section;
        }

        public function getNameSection(){
            return $this->name_Section;
        }

        public function getColor(){
            return $this->color;
        }

        public function getMain(){
            return $this->main;
        }


    }



?>