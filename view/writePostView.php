<html>
    <head>
    <title><?php $titre = 'Rédiger un article'; ?></title>

    <link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/style.css" />

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
   
      <?php include('../includes/header-admin.inc.php'); ?>

      <div id="admin">
        Retour sur le <a href="https://p4ocr.andre-ani.fr/">blog</a>
      <div class="envoie">
        <h2>Publier un nouvel article</h2>
        <form action="index.php?action=writePostA&amp;titre=<?= $post['titre'] ?>&amp;auteur=<?= $post['auteur'] ?>&amp;contenu=<?= $post['contenu'] ?>" method="post">
            Titre : <input type="text" name="titre"/> <br/>
            Auteur : <input type="text" name="auteur"/> <br/>
            <textarea name="contenu" rows="4" cols="50"> </textarea>
            <input type="submit" name="valider" value="OK"/>
        </form>
      </div>

      <div class="posts">
        <h2>Liste des articles</h2>

        <!-- Récupère les variables du formulaire -->
        <?php
         if(isset($_POST['valider'])){
            $titre=$_POST['titre'];
            $auteur=$_POST['auteur'];
            $contenu=$_POST['contenu'];
        }

        ?>




        <?php
        while ($data = $posts->fetch())
      {
      ?>

      <table>
      <tr>
        <th>ID</th>
        <th>Titre</th>
        <th>Auteur</th>
        <th>Date</th>
      </tr>

        <td><?php echo nl2br(htmlspecialchars($data['id'])); ?></td>
        <td><?php echo htmlspecialchars($data['titre']); ?></td>
        <td><?php echo htmlspecialchars($data['auteur']); ?></td>
        <td><?php echo htmlspecialchars($data['date']); ?></td>

    </table>

        <?php

        } // Fin de la boucle des billets
        $list->closeCursor();
        ?>

      </div>

      <div class="com">
        <h2>Vérifier les commentaires</h2>
      </div>

    </div>


<?php include('../includes/footer.inc.php'); ?>

    </body>
</html>
