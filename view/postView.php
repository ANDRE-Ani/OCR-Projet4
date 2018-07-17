<!-- Affichae d'un article et de ses commentaires -->

<?php session_start();?>

<?php $titre = 'Le blog de l\'écrivain : ' . htmlspecialchars($post['titre']);?>

<?php ob_start();?>
<p>Retour sur le <a href="index.php?action=listPosts">blog</a></p>
       
<div class="postCom">
<h3><?=htmlspecialchars($post['titre'])?></h3>
       <div class="author">
       <img src="../images/date.png" alt="date"> <?=$post['post_date']?>
        </div>
            <p>
                <?=$post['contenu']?>
            </p>
            <h3>Commentaires</h3>
        <?php
        
            while ($comment = $comments->fetch()) {
                
        ?>
        </div>
        
        

<div class="postCom">
        

        <div class="author">
        <p><img src="../images/author.png" alt="author"> : <?=htmlspecialchars($comment['author'])?>
        <img src="../images/date.png" alt="date"> <?=$comment['comment_date']?></p>
        </div>
        <p>Commentaire : <?=($comment['comment'])?></p>
        <p><a href="index.php?action=signalCom&amp;id=<?php echo $comment['id']; ?>"><button type="button">Signaler</button></a></p>
        <?php
                
}
?>
</div>

<a href="index.php?action=viewWriteCom&amp;id=<?php echo $data['id']; ?>">Publier un commentaire</a></p>

     <?php $contenu = ob_get_clean();?>

<?php require 'templates/templateFront.php';?>