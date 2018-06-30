<!-- Page principal de l'administration -->

<?php session_start(); ?>

<?php $cookie_name = "userF";
if (isset($_SESSION['user'])) {
$cookie_value = $_SESSION['user'];
setcookie($cookie_name, $cookie_value, time()+3600, "/", null, false, true);
}
?>

<?php $titre = SITE_NAME . ' - Administration'; ?>

<h2>Bienvenue dans l'administration du site</h2>
<p>Vous pouvez gérer, à l'aide des menus à gauche, les articles et commentaires publiés sur le site.</p>

<br><hr><br>

<p><h3>Informations sur le blog :</h3></p>
<p>Nombre d'articles : <?php echo $total[0]; ?></p>
<p>Nombre de commentaires : <?php echo $totalC[0]; ?></p>

<br><hr><br>

<p><h3>Informations sur le serveur</h3></p>
<p>Système d'exploitation : <?php echo php_uname(s); ?></p>
<p>Nom d'hôte : <?php echo php_uname(n); ?></p>
<p>Architecture : <?php echo php_uname(m); ?></p>

<p>Version de PHP : <?php echo phpversion(); ?></p>

<?php $contenu = ob_get_clean(); ?>

<?php require 'templates/templateBack.php'; ?>