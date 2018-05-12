<!DOCTYPE html>
<html lang="fr">

<head>
  <title>Blog d'écrivain</title>
  <meta name="description" content="Vélo'v Location de vélos." />
  <meta name="author" content="Patrice ANDREANI">
  <meta name="keywords" content="vélo'v, location, vélos, lyon">
  <meta charset="UTF-8">
  <!-- import favicon, feuille de style et polices -->
  <link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="css/style.css" />
  <link rel="icon" type="image/png" href="images/favicon.ico" />

  <!-- definition du viewport -->
  <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=yes">

  <!-- Twitter Card data -->
  <meta name="twitter:card" content="Vélo'v Lyon">
  <meta name="twitter:site" content="http://p3ocr.andre-ani.fr/" />
  <meta name="twitter:title" content="Vélo'v Lyon" />
  <meta name="twitter:description" content="Vélo'v Lyon" />
  <meta name="twitter:image" content="http://p3ocr.andre-ani.fr/images/logo-velov.png" />

  <!-- Open Graph data -->
  <meta property="og:title" content="Vélo'v Lyon" />
  <meta property="og:type" content="website" />
  <meta property="og:url" content="http://p3ocr.andre-ani.fr" />
  <meta property="og:image" content="http://p3ocr.andre-ani.fr/images/logo-velov.png" />
  <meta property="og:description" content="Vélo'v Lyon" />
</head>

<body>

<?php include('includes/header.inc.php'); ?>


<div id="contenu">
   <div class="leftcolumn">
     <div class="aside">
       <h2>Titre d'article 1</h2>
       <h3>Auteur - Date</h3>
       <p>Texte article</p>
     </div>

     <div class="aside">
       <h2>Titre d'article 2</h2>
       <h3>Auteur - Date</h3>
      <p>Texte article</p>
     </div>
   </div>


   <div class="rightcolumn">
     <div class="about">
       <h2>About Me</h2>
       <p>A propos de l'auteur</p>
     </div>

     <div class="reseaux">
       <h3>Suivez-moi</h3>
       <p>Réseaux</p>
     </div>
   </div>
</div>


   <?php include('includes/footer.inc.php'); ?>


</body>

</html>
