<!-- Page à propos -->

<?php $titre = 'Le blog de l\'écrivain - A propos'; ?>

<?php ob_start(); ?>

<p><h1>A propos de l'auteur</h1></p>
<p>Jean Forteroche est un acteur et écrivain américain.</p>
<p>Il travaille actuellement sur son dernier roman intitulé : <br><h3>Billet simple pour l'Alaska</h3></p>    

<?php $contenu = ob_get_clean(); ?>

<?php require 'templates/templateFront.php'; ?>