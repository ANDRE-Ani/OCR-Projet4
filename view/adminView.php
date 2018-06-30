<!-- Page principal de l'administration -->

<?php session_start(); ?>

<?php $titre = SITE_NAME . ' - Administration'; ?>



<h2>Bienvenue dans l'administration du site</h2>
<p>Vous pouvez gérer, à l'aide des menus à gauche, les articles et commentaires publiés sur le site.</p>

<p><h3>Informations sur le blog :</h3></p>
<p>Nombre d'articles : <?php echo $total[0]; ?></p>
<p>Nombre de commentaires : <?php echo $totalC[0]; ?></p>

<?php $contenu = ob_get_clean(); ?>

<?php require 'templates/templateBack.php'; ?>