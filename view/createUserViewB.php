<?php session_start();
if (isset($_COOKIE['admin']) && !empty($_COOKIE['admin']) && 
    (isset($_SESSION['admin']) && !empty($_SESSION['admin']))) 
{
    $admin = session_id().microtime().rand(0,9999999999);
    $admin = hash('sha512', $admin);
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

<?php $titre = SITE_NAME . ' - Création de compte'; ?>

<?php ob_start(); ?>

<div class="connecter">
<div class="formulaireCreation">

<!-- Formulaire de création de compte -->
<p>Veuillez créer un identifiant et un mot de passe pour votre compte :</p>

        <form action="index.php?action=createUserB" method="post">
            <p>Identifiant : <input type="text" name="user" required /></p>
            <p>Mail : <input type="text" name="mail" required /></p>
            <p>Mot de passe : <input type="password" name="pass" required /></p>
            <p>Retapper le<br>mot de passe : <input type="password" name="pass2" required /></p>
            <p><input type="submit" value="Valider" /></p>
        </form>
</div>
</div>

<?php $contenu = ob_get_clean(); ?>

<?php require 'templates/templateBack.php'; ?>