<?php $titre = 'Gérer les articles'; ?>

<?php ob_start(); ?>

<h2>Bienvenue dans l'administration du site</h2>
<p>Gérer les articles du site.</p>


<?php $contenu = ob_get_clean(); ?>

<?php require '../templates/templateBack.php'; ?>
