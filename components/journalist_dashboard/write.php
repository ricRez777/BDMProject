<div id="Write" class="tabcontent" style="display:block">
    <section id="Images" class="images-cards">
        <form action="controllers/news_insert.php" method="post" class="formRegisterNews" enctype="multipart/form-data">
            <div class="divInputs">
                <h2>Writing the news...</h2><br>
                <label for="txtTitle">Title</label>
                <input type="text" required name="txtTitle" placeholder="Title" class="formText">

                <label for="txtDescription">Description</label>
                <input type="text" required name="txtDescription" placeholder="Description" class="formText">

                <label for="eventDate">Event date</label>
                <input type="datetime-local" required name="eventDate" class="formText">

                <label for="txtLocation">Location</label>
                <input type="text" required name="txtLocation" placeholder="Location" class="formText">

                <label for="txtKeywords">Keywords</label>
                <input type="text" required name="txtKeywords" placeholder="Keywords" class="formText">

                <label for="cmbSection">Section</label>
                <?php
                    $objSections = new section('', '', '', '');
                    $objSections->get_All_Sections_Combo();
                ?>

                <p>
                    Status: <br>
                    <input type="radio" name="status" value="EDITION">Edition
                    <input type="radio" name="status" value="FINISHED">Finished
                </p>
                
                <br>

                <label for="images[]"> <strong>IMAGES</strong> *Solo se aceptan archivos JPG* </label>
                <div class="row-container">
                    <div id="add-photo-container">
                        <div class="add-new-photo first" id="add-photo">
                            <span><i class="icon-camera"></i></span>
                        </div>
                        <input type="file" required multiple id="add-new-photo" accept=".jpg" name="images[]">
                    </div>
                </div>
                <br>
                <label for="videos"> <strong>VIDEOS</strong> *Solo se aceptan archivos MP4* </label>
                <input type="file" required name="videos[]" accept=".mp4" multiple class="formText">

            </div>
            <div class="divInputs">
                <label for="txtDrafting">Drafting</label>
                <textarea name="txtDrafting" id="" required cols="60" rows="35" placeholder="Drafting..."></textarea>
                <br>
                <input type="submit" name="admin" value="Submit" class="btn-Secondary">
            </div>
        </form>
    </section>
</div>