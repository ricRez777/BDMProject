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
    <div class="commentsList">
        <?php 
            $objCommentarys = new commentary(0, '', $_SESSION['idUse'], $objNewShow->getIdNews());
            $objCommentarys->Get_All_Commentary($objNewShow->getIdUse(), $_SESSION['idUse']);
        ?>
    </div>
    <form action="controllers/commentary_insert.php" method="POST">
        <h2>Escribre lo que piensas: </h2>
        <input type="text" hidden name="idNews" value="<?php echo $objNewShow->getIdNews(); ?>">
        <input type="text" hidden name="idUse" value="<?php echo $_SESSION['idUse']; ?>">
        <textarea name="textCommentary" id="" cols="95" rows="5" placeholder="Deja un comentario sobre la noticia"></textarea><br>
        <input type="submit" class="btn-Primary" value="comment">
    </form>
</div>