<html>
    <head>
    <title>Envoie d'un article
    </title>

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

      <?php include('includes/header-admin.inc.php'); ?>

      <div id="admin">
        
      <div class="envoie">

        <h2>Envoyer un nouvel article</h2>
        <form name="article" method="post" action="saisie.php">
            Titre : <input type="text" name="titre"/> <br/>
            Auteur : <input type="text" name="auteur"/> <br/>
            <textarea name="contenu"><br /> </textarea>
            <input type="submit" name="valider" value="OK"/>
        </form>
      </div>

    </div>
        <!-- Récupère les variables du formulaire -->
        <?php
        if(isset($_POST['valider'])){
            $titre=$_POST['titre'];
            $auteur=$_POST['auteur'];
            $contenu=$_POST['contenu'];
            '<br/>Article envoyé';
        }
        ?>


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

          <!-- Envoie requête dans la BDD -->
          <?php
          try {
              $req = $bdd->prepare('INSERT INTO post(titre, contenu, auteur) VALUES(:titre, :contenu, :auteur)');

              $req->execute(array(
                'titre' => $titre,
                'auteur' => $auteur,
                'contenu' => $contenu
              ));

              echo 'L article a bien été ajouté !';
            }
            catch (Exception $e)
            {
              die('Erreur : ' . $e->getMessage());
            }
            ?>

<?php include('includes/footer.inc.php'); ?>

    </body>
</html>
