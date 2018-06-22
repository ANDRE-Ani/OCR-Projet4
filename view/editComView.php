<!-- Page admin d'édition d'un commentaire -->

<?php $titre = 'Editer un commentaire'; ?>

<?php ob_start(); ?> 
   <div id="admin">
     
   <div class="envoie">
     <h2>Editer un commentaire</h2>
     <form action="index.php?action=editCom&id="<?php echo $idPostCom ?>" method="post">

        <textarea name="contenu" rows="4" cols="50"/> <?php echo $com['comment']; ?>  </textarea>
        
        <p>Statut :
        <SELECT name="statut">
        <option selected>En attente
        <option>Validé
        <option>Signalé
        </SELECT>
        </p>

        <p>Soumettre : <input type="submit" name="valider" value="OK"/></p>
     </form>
   </div>

test2
<?php echo $dataCom['id']; ?>
 </div>

 <?php $contenu = ob_get_clean(); ?>

<?php require 'templates/templateBack.php'; ?>