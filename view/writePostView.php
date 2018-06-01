<?php $titre = 'Publier un article'; ?>

   <?php ob_start(); ?> 
      <div id="admin">
        
      <div class="envoie">
        <h2>Publier un nouvel article</h2>
        <form action="index.php?action=writePostA&amp;titre=<?= $post['titre'] ?>&amp;auteur=<?= $post['auteur'] ?>&amp;contenu=<?= $post['contenu'] ?>" method="post">
            Titre : <input type="text" name="titre"/> <br/>
            Auteur : <input type="text" name="auteur"/> <br/>
            <textarea name="contenu" rows="4" cols="50"> </textarea>
            <input type="submit" name="valider" value="OK"/>
        </form>
      </div>

    </div>
    <?php $contenu = ob_get_clean(); ?>

<?php require './templates/templateBack.php'; ?>
