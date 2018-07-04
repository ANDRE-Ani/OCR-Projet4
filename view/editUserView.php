<!-- Page admin d'édition d'un utilisateur -->

<?php session_start(); ?>

<?php $titre = SITE_NAME . ' - Administration - Editer un utilisateur'; ?>

<?php ob_start(); ?> 
   <div id="admin">
     
   <div class="envoie">
     <h2>Editer un utilisateur</h2>
     <form action="index.php?action=editUserL&id=<?php echo $userE['id'] ?>" method="post">

        Identifiant : <input type="text" name="user" value="<?php echo $userE['user']; ?>" /> <br/>
        Mail : <input type="text" name="mail" value="<?php echo $userE['mail']; ?>" /> <br/> 
        
        <p>Soumettre : <input type="submit" name="valider" value="OK"/></p>
     </form>
   </div>

</div>

 <?php $contenu = ob_get_clean(); ?>

<?php require 'templates/templateBack.php'; ?>