<!-- Page à propos -->

<?php session_start();?>

<?php $titre = SITE_NAME . ' - A propos';?>

<?php ob_start();?>

Retour sur le <a href="index.php?action=listPosts">blog</a>
<p><h1>A propos de l'auteur</h1></p>
<p>Jean Forteroche est un acteur et écrivain américain.</p>
<p>Il travaille actuellement sur son dernier roman intitulé : <br><h3>Billet simple pour l'Alaska</h3></p>
<p>N'hésitez pas à revenir sur son blog pour suivre son actualité.</p>

<?php $contenu = ob_get_clean();?>

<?php require 'templates/templateFront.php';?>