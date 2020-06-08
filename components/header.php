<?php session_start(); ?>

<header class="header">
    <div  class="header-sidebar">
        <a class="logo" href="index.php"><img src="img/Logo.png" width="60" alt="no image"></a>
    </div>
    <form class="formSearch" action="news_search.php" method="POST">
        <input type="text" placeholder="Search" style="margin:0 auto;" name="textsearch" class="formTextLeft">
        <button type="submit" class="btn-Search"><img src="img/busqueda.png" width="10" alt="no image"></button>
    </form>
    <?php 
        if(!isset($_SESSION['Type_Use'])){
    ?> 
        <a href="login.php">LogIn</a>
        <a href="user_register.php">SignIn</a>
    <?php
        }
        else{
    ?>
        <a href="controllers/user_logout.php">Exit</a>    
    <?php
        }
    ?>
</header>