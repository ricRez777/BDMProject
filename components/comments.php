<div class="comments">
    <?php
        $objLikeStatus = new like(0, 0, $_SESSION['idUse'], $objNewShow->getIdNews());
        if($objLikeStatus->Select_Like()){
            if($objLikeStatus->getStatusLike() == 1){
                ?>
                    <form action="controllers/like_controller.php" method="POST">
                        <button type="submit" name="likeUpdate"> <img src="img/like1.png" width=30> </button>
                        <input type="text" hidden name="status" value=0>
                        <input type="text" hidden name="idLike" value="<?php echo $objLikeStatus->getIdLike(); ?>">
                        <input type="text" hidden name="idNew" value="<?php echo $objNewShow->getIdNews(); ?>">
                        <label>Numero de likes: <?php echo $objLikeStatus->Count_Like(); ?> </label>
                    </form>
                <?php
            }
            else{
                ?>
                    <form action="controllers/like_controller.php" method="POST">
                        <button type="submit" name="likeUpdate"> <img src="img/like0.png" width=30> </button>
                        <input type="text" hidden name="status" value=1>
                        <input type="text" hidden name="idLike" value="<?php echo $objLikeStatus->getIdLike(); ?>">
                        <input type="text" hidden name="idNew" value="<?php echo $objNewShow->getIdNews(); ?>">
                        <label>Numero de likes: <?php echo $objLikeStatus->Count_Like(); ?> </label>
                    </form>
                <?php
            }
        }
        else{
            ?>
                <form action="controllers/like_controller.php" method="POST">
                    <button type="submit" name="likeInsert"> <img src="img/like0.png" width=30> </button>
                    <input type="text" hidden name="status" value=1>
                    <input type="text" hidden name="idNew" value="<?php echo $objNewShow->getIdNews(); ?>">
                    <label>Numero de likes: <?php echo $objLikeStatus->Count_Like(); ?> </label>
                </form>
            
            <?php
        }

    ?>
    <br>
    <form action="" method="Post">
        <h2>Comments</h2>
        <textarea name="" id="" cols="95" rows="5" placeholder="Leave your comment"></textarea>
        <input type="submit" class="btn-Primary" value="comment">
    </form>
    <div class="commentsList">
        <div class="commentary">
            <p><strong>Lolo el de la guitarra</strong></p>
            <p>El coronavirus es un complot del gobierno para distraernos</p>
            <button class="btn-Primary btn-Reply">Reply</button>
            <br>
            <form hidden class="form-Comment" action="">
                <textarea name="" id="" cols="60" rows="3" placeholder="Add reply"></textarea>
                <br>
                <input type="submit" class="btn-Primary" value="Send">
            </form>
            <hr>
        </div>
    </div>
</div>