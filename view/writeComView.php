<!-- Page de rédaction d'un commentaire -->

<?php $titre = 'Publier un commentaire'; ?>

   <?php ob_start(); ?> 
      <div id="admin">
        
      <div class="envoie">
        <h2>Publier un nouveau commentaire</h2>
        <form action="index.php?action=writeComA&amp;post_id=<?= $post['idPost'] ?>" method="post">
            Auteur :<br/> <input type="text" name="author"/> <br/>
            Commentaire :<br/> <textarea name="comment" rows="4" cols="50"> </textarea><br/>
            <input type="submit" name="valider" value="OK"/>
        </form>
      </div>
      <?php var_dump($idPost) ?>
    </div>
    <?php $contenu = ob_get_clean(); ?>

<?php require 'templates/templateFront.php'; ?>