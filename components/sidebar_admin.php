
<div class="sidenav">
    <div class="menu">
        <hr>
        <div class="container-row">
            <img src="img/newsPrev.jpg" width=100 alt="no image">
            <div>
                <h3> <?php echo $_SESSION['Name']; ?> </h3>
                <p> <?php echo $_SESSION['Email']; ?> </p>
                <p><a href="journalist_modify.php">MODIFY</a></p>
            </div>
        </div>
        <hr>
        <ul>
            <li><a href="index.php">Home</a></li>
            <li><a href="admin_dashboard.php">Dashboard</a></li>
        </ul>
        <ul id="menu">
            <li><input type="checkbox" name="list" id="nivel1-1"><label for="nivel1-1">Categories</label>
                <ul class="interior">
                    <li><a href="">Salud</a></li>
                    <li><a href="">Deportes</a></li>
                    <li><a href="">Politica</a></li>
                    <li><a href="">Tecnologia</a></li>
                    <li><a href="">Ciencia</a></li>
                </ul>
            </li>
        </ul>
    </div>
</div>