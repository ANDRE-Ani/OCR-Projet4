<!DOCTYPE html>
<html lang="fr">

<head>
  <title>Le blog de Jean Forteroche</title>
  <meta name="description" content="Le blog de Jean Forteroche" />
  <meta name="author" content="Patrice ANDREANI">
  <meta name="keywords" content="écrivain, jean forteroche">
  <meta charset="UTF-8">
  <!-- import favicon, feuille de style et polices -->
  <link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="css/style.css" />
  <link rel="icon" type="image/png" href="images/favicon.ico" />

  <!-- definition du viewport -->
  <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=yes">

  <!-- Twitter Card data -->
  <meta name="twitter:card" content="Le blog de Jean Forteroche">
  <meta name="twitter:site" content="https://p4ocr.andre-ani.fr/" />
  <meta name="twitter:title" content="Le blog de Jean Forteroche" />
  <meta name="twitter:description" content="Le blog de Jean Forteroche" />
  <meta name="twitter:image" content="https://p4ocr.andre-ani.fr/images/logo-velov.png" />

  <!-- Open Graph data -->
  <meta property="og:title" content="Le blog de Jean Forteroche" />
  <meta property="og:type" content="website" />
  <meta property="og:url" content="https://p4ocr.andre-ani.fr" />
  <meta property="og:image" content="https://p4ocr.andre-ani.fr/images/logo-velov.png" />
  <meta property="og:description" content="Le blog de Jean Forteroche" />
</head>

<body>

<?php include('includes/header.inc.php'); ?>




<!-- Se connecte à la BDD -->
<?php
  try
  {
    $bdd = new PDO('mysql:host=localhost;dbname=boutique_ecrivain;charset=utf8', 'boutique_bdd', 'cybergoth1978');
  }
  catch (Exception $e)
  {
    die('Erreur : ' . $e->getMessage());
  }
  ?>



<div id="contenu">
   <div class="leftcolumn">
     <div class="aside">

       <!-- récupère et affiche les articles -->
       <?php
       $req = $bdd->query('SELECT id, titre, date, contenu, auteur FROM post ORDER BY id DESC LIMIT 5');
       while ($donnees = $req->fetch())
       {
       ?>


       <h2><?php echo htmlspecialchars($donnees['titre']); ?></h2>
       <p>Auteur : <?php echo nl2br(htmlspecialchars($donnees['auteur'])); ?></p>
       <p><?php echo nl2br(htmlspecialchars($donnees['contenu'])); ?></p>
       <p>Publié le : <?php echo htmlspecialchars($donnees['date']); ?></p>

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
