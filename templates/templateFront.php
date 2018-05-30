<!DOCTYPE html>
<html lang="fr">

<head>
  <title><?= $titre ?></title>
  <meta name="description" content="Le blog de Jean Forteroche" />
  <meta name="author" content="Patrice ANDREANI">
  <meta name="keywords" content="écrivain, jean forteroche">
  <meta charset="UTF-8">

  <link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="css/style.css" />
  <link rel="icon" type="image/png" href="images/favicon.ico" />

  <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=yes">

  <meta name="twitter:card" content="Le blog de Jean Forteroche">
  <meta name="twitter:site" content="https://p4ocr.andre-ani.fr/" />
  <meta name="twitter:title" content="Le blog de Jean Forteroche" />
  <meta name="twitter:description" content="Le blog de Jean Forteroche" />
  <meta name="twitter:image" content="https://p4ocr.andre-ani.fr/images/logo-velov.png" />

  <meta property="og:title" content="Le blog de Jean Forteroche" />
  <meta property="og:type" content="website" />
  <meta property="og:url" content="https://p4ocr.andre-ani.fr" />
  <meta property="og:image" content="https://p4ocr.andre-ani.fr/images/logo-velov.png" />
  <meta property="og:description" content="Le blog de Jean Forteroche" />
</head>

<body>

<?php include('includes/header.inc.php'); ?>

<div id="contenu">
   <div class="leftcolumn">
     <div class="aside">

        <?= $contenu ?>

     </div>

   </div>


   <div class="rightcolumn">
     <div class="about">
       <h2>A propos</h2>
       <p>A propos de l'auteur</p>
     </div>

     <div class="reseaux">
       <h3>Suivez-moi</h3>
       <p>Réseaux sociaux</p>
     </div>

     <div class="admin">
       <h3>Publier</h3>
<<<<<<< HEAD:templates/templateFront.php
       <p><a href="index.php?action=connection">Administration</a></p>
=======
       <p><p><a href="index.php?action=writePostA">Administration</a></p>
>>>>>>> 18d5166f7f07009b2874e7d920c2fe2bf426caee:templates/template.php
     </div>

   </div>
</div>

   <?php include('includes/footer.inc.php'); ?>

</body>

</html>
