<div id="Users" class="tabcontent">
    <div class="container-row">
        <form class="formRegisterJournalist" action="controllers/user_insert.php" method="Post" enctype="multipart/form-data">
            <div class="divInputs">
                <h1>Register Journalist</h1>

                <label for="Name" class="formLabel">Name</label>
                <input type="text" required name="Name" placeholder="Name" class="formText">

                <label for="LastName" class="formLabel">Last Name</label>
                <input type="text" required name="LastName" placeholder="Last Name" class="formText">

                <label for="Phone" class="formLabel">Phone</label>
                <input type="number" required name="Phone" placeholder="Phone" class="formText">

                <label for="Firm" class="formLabel">Firm</label>
                <input type="text" required name="Firm" placeholder="Firm" class="formText">
                
                <label for="Email" class="formLabel">E-mail</label>
                <input type="e-mail" required name="Email" placeholder="Email" class="formText">
                
                <label for="Pass" class="formLabel">Password</label>
                <input type="password" required name="Pass" placeholder="Password" class="formText">

                <label for="Role" class="formLabel">Role</label>
                <select name="Role" class="formText">
                    <option value="JOURNALIST">Journalist</option>
                    <option value="ADMIN">Admin</option>
                </select>

                <section id="Images" class="images-cards">
                    <label for="image">Profile Picture</label>
                    <div class="row-container">
                        <div id="add-photo-container">
                            <div class="add-new-photo first" id="add-photo">
                                <span><i class="icon-camera"></i></span>
                            </div>
                            <input type="file" id="add-new-photo" required name="image-photo">
                        </div>
                    </div>
                </section>

                <input type="submit" value="Register now!" class="btn-Secondary">
            </div>
        </form>

        <div class="list-user">
            <h3>Registered users:</h3>
            <br>
            <?php 
                $objJournalist = new user("", "", "", "", "", "", "", "");
                $objJournalist->get_All_Journalist();
            ?>
        </div>
        
    </div>
</div>