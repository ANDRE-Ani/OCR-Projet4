<!-- Page admin d'édition d'un commentaire -->

<?php $titre = 'Editer un commentaire'; ?>

<?php ob_start(); ?> 
   <div id="admin">
     
   <div class="envoie">
     <h2>Editer un commentaire</h2>
     <form action="index.php?action=editComBack&id=<?php echo $com['id'] ?>" method="post">

        <textarea name="contenu" rows="4" cols="50"/> <?php echo $com['comment']; ?>  </textarea>
        
        <p>Statut :
        <SELECT id="statut">
        <option value="en attente">En attente</option>
        <option value="valide">Validé</option>
        <option value="signale">Signalé</option>
        </SELECT>
        </p>

        <p>Soumettre : <input type="submit" name="valider" value="OK"/></p>
     </form>
   </div>

</div>

 <?php $contenu = ob_get_clean(); ?>

<?php require 'templates/templateBack.php'; ?>