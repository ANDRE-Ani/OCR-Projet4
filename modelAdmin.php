<?php

// Envoie requête dans la BDD
/* function writePosts() {
$bdd = dbConnect(); */

if(isset($_POST['titre']) && isset($_POST['auteur']) && isset($_POST['contenu'])){
    lireBdd($_POST['titre'], $_POST['auteur'], $_POST['contenu']);
}

// Envoie requête dans la BDD
function lireBdd($titre, $auteur, $contenu) {

    $bdd = dbConnect();

    try {
        // Ecris l'article dans la BDD
        $req = $bdd->prepare('INSERT INTO post(titre, contenu, auteur) VALUES(:titre, :contenu, :auteur)');
        $req->bindParam(':titre',$titre,PDO::PARAM_STR);
        $req->bindParam(':contenu',$contenu, PDO::PARAM_STR);
        $req->bindParam(':auteur', $auteur, PDO::PARAM_STR);
        $req->execute();
        echo 'L article a bien été ajouté !';
        return $req;
    }
    catch (Exception $e)
    {
        die('Erreur : ' . $e->getMessage());
    }
}

















// Ecris l'article dans la BDD
/* $req = $bdd->prepare('INSERT INTO post(titre, contenu, auteur) VALUES(:titre, :contenu, :auteur)');
$req->bindValue(':titre','$titre',PDO::PARAM_STR);
$req->bindValue(':contenu','$contenu', PDO::PARAM_STR);
$req->bindValue(':auteur', '$auteur', PDO::PARAM_STR);
$req->execute();
echo 'L article a bien été ajouté !';
return $req; */


/* try {
    $wrt = $bdd->prepare('INSERT INTO post(titre, contenu, auteur) VALUES(:titre, :contenu, :auteur)');
    $wrt->execute(array(
      'titre' => $titre,
      'auteur' => $auteur,
      'contenu' => $contenu
    ));
    return $wrt;
    $wrt->closeCursor();
    echo 'L article a bien été ajouté !';
  }
  catch (Exception $e) {
              die('Erreur : ' . $e->getMessage());
            } */
}


// Liste les articles
function listPosts() {
$bdd = dbConnect();

try {
    $list = $bdd->query('SELECT id, titre, date, contenu, auteur FROM post ORDER BY id DESC LIMIT 8');
    return $list;
    $list->closeCursor();
  }
  catch (Exception $e) {
              die('Erreur : ' . $e->getMessage());
            }
}



//Se connecte à la BDD
  function dbConnect() {
      try {
          $bdd = new PDO('mysql:host=localhost;dbname=boutique_ecrivain;charset=utf8', 'boutique_bdd', 'cybergoth1978');
          return $bdd;
          $wrt->closeCursor();
      }
      catch(Exception $e) {
          die('Erreur : '.$e->getMessage());
      }
  }
