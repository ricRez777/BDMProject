<div id="Sections" class="tabcontent">
    <div class="container-row">
        <div class="container-sectionform">
            <!--Form for insert section-->
            <form class="formSection" action="controllers/section_insert.php" Method="Post">
                <div class="divInputs">
                    <h1>Register Section</h1>

                    <label for="Section" class="formLabel">Name Section</label>
                    <input type="text" name="Section" placeholder="Name Section" class="formText">
                    
                    <div>
                        <label for="sectionMain">Will this section be one of the main ones?</label>
                        <input name="sectionMain" type="checkbox">
                    </div>
                    <br>
                    <label for="Colour" class="formLabel">Colour</label>
                    <input type="color" name="Colour" value="#DC8516" class="formText">
                    <br>

                    <input type="submit" value="Register now!" class="btn-Secondary">
                    
                </div>
            </form>
            <!--Form for update section-->
            <form class="formSection" action="controllers/section_update.php" Method="Post">
                <div class="divInputs">
                    <h1>Modify Section</h1>

                    <label for="Section" class="formLabel">Section</label>
                    <?php 
                        $objSections->get_All_Sections_Combo();
                    ?>

                    <label for="NameSection" class="formLabel">New name section</label>
                    <input type="text" name="NameSection" placeholder="Name Section" class="formText">
                    
                    <div>
                        <label for="sectionMain">Will this section be one of the main ones?</label>
                        <input name="sectionMain" type="checkbox">
                    </div>
                    <br>
                    <label for="Colour" class="formLabel">Colour</label>
                    <input type="color" name="Colour" value="#DC8516" class="formText">
                    <br>

                    <input type="submit" value="Modify" class="btn-Secondary">
                    
                </div>
            </form>
        </div>

        <div class="list-user">
            <h3>Registered sections:</h3>
            <br>
            <?php 
                $objSections->get_All_Sections();
            ?>
        </div>
    </div>
</div>