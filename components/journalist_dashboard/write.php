<div id="Write" class="tabcontent" style="display:block">
    <section id="Images" class="images-cards">
        <form action="controllers/news_insert.php" method="post" class="formRegisterNews" enctype="multipart/form-data">
            <div class="divInputs">
                <h2>Writing the news...</h2><br>
                <label for="txtTitle">Title</label>
                <input type="text" name="txtTitle" placeholder="Title" class="formText">

                <label for="txtDescription">Description</label>
                <input type="text" name="txtDescription" placeholder="Description" class="formText">

                <label for="eventDate">Event date</label>
                <input type="datetime-local" name="eventDate" class="formText">

                <label for="txtLocation">Location</label>
                <input type="text" name="txtLocation" placeholder="Location" class="formText">

                <label for="publicationDate">Publication Date</label>
                <input type="date" name="publicationDate" class="formText">

                <label for="txtKeywords">Keywords</label>
                <input type="text" name="txtKeywords" placeholder="Keywords" class="formText">

                <label for="cmbSection">Section</label>
                <?php
                    $objSections = new section('', '', '', '');
                    $objSections->get_All_Sections_Combo();
                ?>

                <p>
                    Status: <br>
                    <input type="radio" name="status" value="DRAFT">Draft
                    <input type="radio" name="status" value="FINISH">Finish
                </p>
                
                <br>

                <label for="images[]">Images</label>
                <div class="row-container">
                    <div id="add-photo-container">
                        <div class="add-new-photo first" id="add-photo">
                            <span><i class="icon-camera"></i></span>
                        </div>
                        <input type="file" multiple id="add-new-photo" name="images[]">
                    </div>
                </div>

                <label for="videos">Videos</label>
                <input type="file" name="videos[]" multiple class="formText">

            </div>
            <div class="divInputs">
                <label for="txtDrafting">Drafting</label>
                <textarea name="txtDrafting" id="" cols="60" rows="35" placeholder="Drafting..."></textarea>
                <br>
                <input type="submit" name="admin" value="Send to admin" class="btn-Secondary">
            </div>
        </form>
    </section>
</div>