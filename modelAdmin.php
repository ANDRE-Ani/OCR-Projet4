<?php

// Envoie requête dans la BDD
function writePosts() {
$bdd = dbConnect();

try {
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
