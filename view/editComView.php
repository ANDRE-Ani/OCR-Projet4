<?php session_start();

if (isset($_COOKIE['admin']) && !empty($_COOKIE['admin']) && 
    (isset($_SESSION['admin']) && !empty($_SESSION['admin']))) 
{
    $admin = session_id().microtime().rand(0,9999999999);
    $admin = hash('sha512', $ticket);
    $_COOKIE['admin'] = $admin;
    $_SESSION['admin'] = $admin;
}
else
{
    $_SESSION = array();
    session_destroy();
    header('Location: index.php?action=listPosts');
}
?>

<?php $titre = SITE_NAME . ' - Administration - Editer un commentaire'; ?>

<?php ob_start(); ?> 
   <div id="admin">
     
   <div class="envoie">
     <h2>Editer un commentaire</h2>
     <form action="index.php?action=editComBack&id=<?php echo $com['id'] ?>" method="post">

        <textarea name="contenu" rows="4" cols="50"/> <?php echo $com['comment']; ?></textarea>
        
        <p>Statut :
        <SELECT name="statut">
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