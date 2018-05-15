<!DOCTYPE html>
<html lang="fr">

<head>
  <title>Le blog de Jean Forteroche</title>
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

       <?php

               while ($donnees = $req->fetch())

               {
               ?>

       <h2><?php echo htmlspecialchars($donnees['titre']); ?></h2>
       <p>Auteur : <?php echo nl2br(htmlspecialchars($donnees['auteur'])); ?> Publié le : <?php echo htmlspecialchars($donnees['date']); ?></p>
       <p><?php echo nl2br(htmlspecialchars($donnees['contenu'])); ?></p>
       <p>Publier un <a href ="#">commentaire</a></p>
<hr>
     <?php

     } // Fin de la boucle des billets
     $req->closeCursor();
     ?>
    <br>
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
       <p><a href="connecter.php">Administration</a></p>
     </div>

   </div>
</div>

   <?php include('includes/footer.inc.php'); ?>

</body>

</html>
