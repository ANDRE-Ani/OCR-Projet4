<!-- Affichae d'un article et de ses commentaires -->

<?php $titre = 'Le blog de l\'écrivain : '.htmlspecialchars($post['titre']); ?>

<?php ob_start(); ?>
<p>Retour sur le <a href="https://p4ocr.andre-ani.fr/">blog</a></p>
       <h3><?= htmlspecialchars($post['titre']) ?></h3>
                le <?= $post['post_date'] ?>
            
            <p>
                <?= nl2br(htmlspecialchars($post['contenu'])) ?>
            </p>
        
        <h2>Commentaires</h2>

        <?php
        while ($comment = $comments->fetch()) {
            ?>
            <img src="../images/stylo.png">

        <p>Auteur : <?= htmlspecialchars($comment['author']) ?>
          le <?= $comment['comment_date'] ?></p>
        <p>Commentaire : <?= nl2br(htmlspecialchars($comment['comment'])) ?></p>
        <p><a href="index.php?action=signalCom&amp;id=<?php echo $comment['id']; ?>"><button type="button">Signaler</button></a></p> 
        <?php
        }
        ?>
        
     <?php $contenu = ob_get_clean(); ?>

<?php require 'templates/templateFront.php'; ?>