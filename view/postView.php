<!-- Affichae d'un article et de ses commentaires -->

<?php session_start(); ?>

<?php $titre = 'Le blog de l\'écrivain : '.htmlspecialchars($post['titre']); ?>

<?php ob_start(); ?>
<p>Retour sur le <a href="https://p4ocr.andre-ani.fr/">blog</a></p>
       <h3><?= htmlspecialchars($post['titre']) ?></h3>
                Publié le <?= $post['post_date'] ?>
            
            <p>
                <?= $post['contenu'] ?>
            </p>
        
        <h2>Commentaires</h2>

        <?php
        while ($comment = $comments->fetch()) {
            ?>
            <img src="../images/stylo.png">

        <p>Auteur : <?= htmlspecialchars($comment['author']) ?></p>
        <p>Le <?= $comment['comment_date'] ?></p>
        <p>Commentaire : <?= ($comment['comment']) ?></p>
        <p><a href="index.php?action=signalCom&amp;id=<?php echo $comment['id']; ?>"><button type="button">Signaler</button></a></p> 
        <?php
        }
        ?>
        
     <?php $contenu = ob_get_clean(); ?>

<?php require 'templates/templateFront.php'; ?>