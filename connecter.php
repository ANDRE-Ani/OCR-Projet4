<!DOCTYPE html>
<html lang="fr">

<head>
  <title>Se connecter</title>
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

<?php include('includes/header-admin.inc.php'); ?>

<div class="connecter">
<div class="formulaireAdmin">
<!-- Formulaire de connexion à l'administration -->
<p>Veuillez entrer vos identifiants pour vous connecter à l'administartion du blog :</p>

        <form action="connecter.php" method="post">
            <p>
              <input type="text" name="pseudo" />
            <input type="password" name="pass" />
            <input type="submit" value="Valider" />
            </p>
        </form>
</div>
</div>

<?php
    // Vérification mot de passe pour administration
    $pseudo = 'ecrivain';
    $pass = 'motdepasse';
    if ((!isset($_POST['pass']) OR $_POST['pass'] != $pass) && (!isset($_POST['pseudo']) OR $_POST['pseudo'] != $pseudo))
    {
?>

<?php
    }
    else {
        header( 'Location: https://p4ocr.andre-ani.fr/saisie.php' );
        exit();
    }
?>

   <?php include('includes/footer.inc.php'); ?>

</body>
</html>
