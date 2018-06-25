<!-- Page principal de l'administration -->

<?php $titre = 'Administration du site'; ?>

<?php 
if (isset($_SESSION['user'])) {
    echo 'Bonjour ' . $_SESSION['user'];
}
else {
    echo "rien";
}
?>

<h2>Bienvenue dans l'administration du site</h2>
<p>Vous pouvez gérer, à l'aide des menus à gauche, les articles et commentaires publiés sur le site.</p>

<?php $contenu = ob_get_clean(); ?>

<?php require 'templates/templateBack.php'; ?>