<!-- Page admin d'édition d'un article -->

<?php session_start(); ?>

<?php $titre = SITE_NAME . ' - Administration - Editer un article'; ?>

<?php ob_start(); ?> 
   <div id="admin">
   <div class="envoie">

     <h2>Editer un article</h2>
     <form action="index.php?action=editPost&id=<?php echo $postE['id'] ?>" method="post">
         Titre : <input type="text" name="titre" value="<?php echo $postE['titre']; ?>" /> <br/>
         Auteur : <input type="text" name="auteur" value="<?php echo $postE['auteur']; ?>" /> <br/>
         <textarea name="contenu" rows="4" cols="50"/> <?php echo $postE['contenu']; ?>  </textarea>
         <input type="submit" name="valider" value="OK"/>
     </form>
   </div>

 </div>

 <?php $contenu = ob_get_clean(); ?>

<?php require 'templates/templateBack.php'; ?>