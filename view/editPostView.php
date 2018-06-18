<!-- Page admin d'édition d'un article -->

<?php $titre = 'Editer un article'; ?>

<?php ob_start(); ?> 
   <div id="admin">
     
   <div class="envoie">
     <h2>Editer un article</h2>
     <form action="index.php?action=editPostA" method="post">
         Titre : <input type="text" name="titre" value="<?php echo $_GET['titre']; ?>" /> <br/>
         Auteur : <input type="text" name="auteur" value="<?php echo $_GET['auteur']; ?>" /> <br/>
         <textarea name="contenu" rows="4" cols="50"/> <?php echo $_GET['contenu']; ?>  </textarea>
         <input type="submit" name="valider" value="OK"/>
     </form>
   </div>

 </div>
 <?php $contenu = ob_get_clean(); ?>

<?php require 'templates/templateBack.php'; ?>