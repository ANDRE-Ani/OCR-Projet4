<?php $titre = 'Le blog de l\'écrivain : '.htmlspecialchars($post['titre']); ?>

<?php ob_start(); ?>

       <h3>

                <?= htmlspecialchars($post['titre']) ?>
                <em>le <?= $post['date'] ?></em>
            </h3>

            <p>
                <?= nl2br(htmlspecialchars($post['contenu'])) ?>
            </p>
        

        <h2>Commentaires</h2>

        <?php
        while ($comment = $comments->fetch())
        {
        ?>

        <p>Auteur : <?= htmlspecialchars($comment['author']) ?>
          le <?= $comment['comment_date'] ?></p>
        <p>Commentaire : <?= nl2br(htmlspecialchars($comment['comment'])) ?></p>

        <?php
        }
        ?>

     <?php $contenu = ob_get_clean(); ?>

<?php require 'templates/templateFront.php'; ?>