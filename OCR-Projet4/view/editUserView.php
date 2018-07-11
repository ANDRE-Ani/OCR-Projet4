<!-- Page admin d'édition d'un utilisateur -->

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