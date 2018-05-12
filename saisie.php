<html>
    <head>
    <title>Envoie d'un article
    </title>

    <script type="text/javascript" src="tinymce/js/tinymce/tinymce.min.js"></script>
    <script type="text/javascript">
    !--
    tinyMCE.init({
    mode : "textareas",
    valid_elements : "em/i,strike,u,strong/b,div[align],br,#p[align],-ol[type|compact],-ul[type|compact],-li"
    });
    //-->
    </script>

    </head>
    <body>
        <h1>Envoyer un article</h1>
        <form name="article" method="post" action="saisie.php">
            Entrez titre : <input type="text" name="titre"/> <br/>
            <textarea name="article"><br /> </textarea>
            <input type="submit" name="valider" value="OK"/>
        </form>
        <!-- Récupère les variables du formulaire -->
        <?php
        if(isset($_POST['valider'])){
            $titre=$_POST['titre'];
            $article=$_POST['article'];
            echo 'Le titre '. $titre.'et '. $article.'<br/>Article envoyé';
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
    </body>
</html>
