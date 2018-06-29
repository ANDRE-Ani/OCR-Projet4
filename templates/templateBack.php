<?php
session_start();
$_SESSION['user'] = $user;
?>

<!DOCTYPE html>
<html lang="fr">

<head>
  <title><?= $titre ?></title>
  <meta name="description" content="Le blog de Jean Forteroche" />
  <meta name="author" content="Patrice ANDREANI">
  <meta name="keywords" content="écrivain, jean forteroche">
  <meta charset="UTF-8">

  <link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="../css/style.css" />
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
  <script type="text/javascript" src="tinymce/js/tinymce/tinymce.min.js"></script>
    <script type="text/javascript">
    <!-- !-- -->
    tinyMCE.init({
    mode : "textareas",
    valid_elements : "em/i,strike,u,strong/b,div[align],br,#p[align],-ol[type|compact],-ul[type|compact],-li"
    });
    <!-- //--> -->
    </script>

</head>

<body>

<?php include('includes/header-admin.inc.php'); ?>

<div id="contenu">

   <div class="leftcolumn2">
     <div class="post">
     <p>Retour sur le <a href="https://p4ocr.andre-ani.fr/" title="Retour sur l'accueil du blog">blog</a></p>
     <img src="../images/commentaires.png">
       <h2>Articles</h2>
       <p><a href="../index.php?action=viewWritePost" title="Publier un nouvel article">Publier un article</a></p>
        <p><a href="../index.php?action=viewAllPost" title="Gérer les articles du blog">Gérer les articles</a></p>
     </div>

    <hr>

     <div class="comments">
     <img src="../images/articles.png">
       <h3>Commentaires</h3>
       <p><a href="../index.php?action=viewAllCom" title="Gérer les commentaires du blog">Gérer les commentaires</a></p>
     </div>
     </div>
     <div class="rightcolumn2">
     <div class="admintext">

        <?= $contenu ?>

     </div>
   </div>

   </div>

   <?php include('includes/footer.inc.php'); ?>

</body>

</html>
