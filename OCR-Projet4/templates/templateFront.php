<!DOCTYPE html>
<html lang="fr">

<head>
  <title><?=$titre?></title>
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

<?php include 'includes/header.inc.php';?>

<div id="contenu">
   <div class="leftcolumn">
     <div class="aside">

        <?=$contenu?>

     </div>

   </div>

   <div class="rightcolumn">
     <div class="about">
       <h3>A propos</h3>
       <p>A propos de l'<a href="index.php?action=about">auteur</a></p>
     </div>

     <div class="reseaux">
       <h3>Suivez-moi</h3>
       <p><a href="https://mamot.fr/auth/sign_in" target="_blank"><img src="images/mastodon.png" width="32" height="34" alt="Mastodon"></a>
       <a href="https://framasphere.org/users/sign_in" target="_blank"><img src="images/diaspora.png" width="32" height="32" alt="Diaspora"></a></p>
     </div>

     <div class="admin">
       <h3>Administration</h3>

      <?php
if (isset($_SESSION['user'])) {
    echo '<p>Connecté : ' . '<a href="index.php?action=administration">' . $_SESSION['user'] . '</a></p>';
    echo '<p><a href="index.php?action=logout">Se déconnecter</a></p>';
} else {
    echo '<p><a href="index.php?action=connection">Se connecter</a></p>';
    echo '<p><a href="index.php?action=creationUser">Créer un compte</a></p>';
}
?>

     </div>

   </div>
</div>

   <?php include 'includes/footer.inc.php';?>

</body>

</html>
