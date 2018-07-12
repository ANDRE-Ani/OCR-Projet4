<!-- Page à propos -->

<?php session_start();?>

<?php $titre = SITE_NAME . ' - A propos';?>

<?php ob_start();?>

Retour sur le <a href="index.php?action=listPosts">blog</a>

<div id="aboutAuthor">
<p><h1>A propos de l'auteur</h1></p>
<p><strong>Jean Forteroche</strong> est un acteur et écrivain américain.</p>
<p>Il travaille actuellement sur son dernier roman intitulé : <br><h4><strong>Billet simple pour l'Alaska</strong></h4></p>
<p>N'hésitez pas à revenir sur son blog pour suivre son actualité.</p>
</div>
<?php $contenu = ob_get_clean();?>

<?php require 'templates/templateFront.php';?>