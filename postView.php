<!DOCTYPE html>
<html lang="fr">

<head>
  <title>Le blog de l'écrivain</title>
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

       <h3>

                <?= htmlspecialchars($post['titre']) ?>
                <em>le <?= $post['date'] ?></em>
            </h3>

            <p>
                <?= nl2br(htmlspecialchars($post['contenu'])) ?>
            </p>
        </div>

        <h2>Commentaires</h2>

        <?php
        while ($comment = $comments->fetch())
        {
        ?>

        <p>Auteur : <?= htmlspecialchars($comment['author']) ?>
          le <?= $comment['comment_date'] ?></p>
        <p>Commentaire : <?= nl2br(htmlspecialchars($comment['comment'])) ?></p>

        <?php
        }
        ?>

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
       <p><a href="connection.php">Administration</a></p>
     </div>

   </div>
</div>

   <?php include('includes/footer.inc.php'); ?>

</body>

</html>
