

<?php $titre = 'Le blog de l\'écrivain'; ?>

<?php ob_start(); ?>

       <?php
        while ($data = $posts->fetch())

           {
              ?>

      <h2><?php echo htmlspecialchars($data['titre']); ?></h2>
        <p>Auteur : <?php echo nl2br(htmlspecialchars($data['auteur'])); ?> Publié le : <?php echo htmlspecialchars($data['date']); ?></p>
        <p><?php echo nl2br(htmlspecialchars($data['contenu'])); ?></p>
        
        <p><a href="post.php?id=<?= $data['id'] ?>">Commentaires</a></p>
        
      
      <hr>
    <?php

    }
    $posts->closeCursor();
    ?>

<?php $contenu = ob_get_clean(); ?>

<?php require 'templates/template.php'; ?>

    