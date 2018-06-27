<!-- Page d'accueil du blog -->

<?php $titre = 'Le blog de l\'écrivain'; ?>

<?php ob_start(); ?>

       <?php
        while ($data = $posts->fetch()) {
            ?>

      <!-- Récupération des articles -->
      
      <h2><?php echo htmlspecialchars($data['titre']); ?></h2>
        <p>Auteur : <?php echo nl2br(htmlspecialchars($data['auteur'])); ?></p>
        <p>Publié le : <?php echo htmlspecialchars($data['post_date']); ?></p>
        
        <?php $description = ($data['contenu']);
        echo substr($description, 0, 40)."(...)"; ?>
        <a href="index.php?action=post&amp;id=<?php echo $data['id']; ?>">Lire la suite</a>

        <p><a href="index.php?action=post&amp;id=<?php echo $data['id']; ?>">Voir les commentaires</a></p>
        <p><a href="index.php?action=viewWriteCom&amp;id=<?php echo $data['id']; ?>">Publier un commentaire</a></p>
      
        <img src="../images/stylo.png">

    <?php
        }
    $posts->closeCursor();
    ?>

<?php $contenu = ob_get_clean(); ?>

<?php require 'templates/templateFront.php'; ?>
