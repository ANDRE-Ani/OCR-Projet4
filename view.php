<?php $titre = 'Le blog de l écrivain'; ?>

<?php ob_start(); ?>

<?php
while ($donnees = $req->fetch())

            {
               ?>

       <h2><?php echo htmlspecialchars($donnees['titre']); ?></h2>
       <p>Auteur : <?php echo nl2br(htmlspecialchars($donnees['auteur'])); ?> Publié le : <?php echo htmlspecialchars($donnees['date']); ?></p>
       <p><?php echo nl2br(htmlspecialchars($donnees['contenu'])); ?></p>
       <p>Publier un <a href ="#">commentaire</a></p>
<hr>
     <?php

     } // Fin de la boucle des billets
     $req->closeCursor();
     ?>

     <?php $contenu = ob_get_clean(); ?>

<?php require 'templates/template.php'; ?>
