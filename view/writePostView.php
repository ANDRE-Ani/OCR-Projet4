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

<?php $titre = SITE_NAME . ' - Administration - Publier un article'; ?>

   <?php ob_start(); ?> 
      <div id="admin">
        
      <div class="envoie">
        <h2>Publier un nouvel article</h2>
        <form action="index.php?action=writePostA" method="post">
            Titre : <input type="text" name="titre"/> <br/>
            Auteur : <input type="text" name="auteur"/> <br/>
            <textarea name="contenu" rows="4" cols="50"> </textarea>
            <input type="submit" name="valider" value="OK"/>
        </form>
      </div>

    </div>
    <?php $contenu = ob_get_clean(); ?>

<?php require 'templates/templateBack.php'; ?>
