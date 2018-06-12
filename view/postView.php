<!-- Affichae d'un article et de ses commentaires -->

<?php $titre = 'Le blog de l\'écrivain : '.htmlspecialchars($post['titre']); ?>

<?php ob_start(); ?>
       <h3><?= htmlspecialchars($post['titre']) ?></h3>
                le <?= $post['date'] ?>
            
            <p>
                <?= nl2br(htmlspecialchars($post['contenu'])) ?>
            </p>
        
        <h2>Commentaires</h2>

        <?php
        while ($comment = $comments->fetch()) {
            ?>

        <p>Auteur : <?= htmlspecialchars($comment['author']) ?>
          le <?= $comment['comment_date'] ?></p>
        <p>Commentaire : <?= nl2br(htmlspecialchars($comment['comment'])) ?></p>

        <?php
        }
        ?>

     <?php $contenu = ob_get_clean(); ?>

<?php require 'templates/templateFront.php'; ?>