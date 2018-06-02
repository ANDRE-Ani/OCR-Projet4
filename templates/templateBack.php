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

<?php include('https://p4ocr.andre-ani.fr/includes/header-admin.inc.php'); ?>

<div id="contenu">

   <div class="leftcolumn2">
     <div class="post">
     Retour sur le <a href="https://p4ocr.andre-ani.fr/">blog</a>
       <h2>Articles</h2>
       <p><a href="../index.php?action=writePostBack">Publier un article</a></p>
        <p><a href="../index.php?action=modifyPost">Gérer les articles</a></p>
     </div>

    <hr>

     <div class="comments">
       <h3>Commentaires</h3>
       <p><a href="../index.php?action=modifyCom">Gérer les commentaires</a></p>
     </div>
     </div>
     <div class="rightcolumn2">
     <div class="admintext">

        <?= $contenu ?>

     </div>
   </div>

   </div>

   <?php include('https://p4ocr.andre-ani.fr/includes/footer.inc.php'); ?>

</body>

</html>
