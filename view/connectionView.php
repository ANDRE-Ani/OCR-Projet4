<?php session_start();
$cookie_name = "admin";
$admin = session_id() . microtime() . rand(0, 9999999999);
$admin = hash('sha512', $admin);
setcookie($cookie_name, $admin, time() + (60 * 20), "/", "p4ocr.andre-ani.fr", true, true);
$_SESSION['admin'] = $admin;
?>

<?php $titre = SITE_NAME . ' - Connexion à l\'administration'; ?>
<?php ob_start(); ?>
<div class="connecter">
<div class="formulaireLogin">

<!-- Formulaire de connexion à l'administration -->
<p>Veuillez entrer vos identifiants pour vous connecter à l'administartion du blog :</p>

        <form action="index.php?action=logAdminF" method="post">
            <p>Identifiant : <input type="text" name="user" required /></p>
            <p>Mot de passe : <input type="password" name="pass" required /></p>
            <p><input type="submit" value="Valider" /></p>
        </form>
</div>
</div>

<?php $contenu = ob_get_clean(); ?>
<?php require 'templates/templateUser.php'; ?>