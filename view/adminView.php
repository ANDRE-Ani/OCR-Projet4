<!-- Page principal de l'administration -->

<?php $titre = 'Administration du site'; ?>

<?php ob_start(); ?>

<h2>Bienvenue dans l'administration du site</h2>
<p>Vous pouvez gérer, à l'aide des menus à gauche, les articles et commentaires publiés sur le site.</p>


<?php $contenu = ob_get_clean(); ?>

<?php require 'templates/templateBack.php'; ?>