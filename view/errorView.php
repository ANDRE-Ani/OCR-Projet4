<!-- Page d'erreur -->

<?php session_start();?>

<?php $cookie_name = "visitor";
$addr = $_SERVER['REMOTE_ADDR'];
$nav = $_SERVER['HTTP_USER_AGENT'];
$cookie_value = 'Utilisateur anonyme ' . ' I.P. ' . $addr . ' Navigateur ' . $nav;
setcookie($cookie_name, $cookie_value, time() + 3600, "/", null, false, true);
?>

<?php $titre = 'Le blog de l\'écrivain - Page non trouvée';?>

<?php ob_start();?>

<p>ERREUR</p>
<h2>La page demandée n'a pas été trouvée, il semble y avoir une erreur...</h2>

<p>Retour sur le <a href="index.php?action=listPosts">blog</a></p>

<?php $contenu = ob_get_clean();?>

<?php require 'templates/templateFront.php';?>