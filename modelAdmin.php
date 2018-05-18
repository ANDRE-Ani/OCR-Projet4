<?php

//Se connecte à la BDD
  function dbConnect()
  {
      try {
          $bdd = new PDO('mysql:host=localhost;dbname=boutique_ecrivain;charset=utf8', 'boutique_bdd', 'cybergoth1978');
          return $bdd;
          $req->closeCursor();
      }
      catch(Exception $e) {
          die('Erreur : '.$e->getMessage());
      }
  }

  

// Envoie requête dans la BDD
function lireBdd() {

$bdd = dbConnect();

try {
  // Ecris l'article dans la BDD
    $req = $bdd->prepare('INSERT INTO post(titre, contenu, auteur) VALUES(:titre, :contenu, :auteur)');
    $req->execute(array(
      'titre' => $titre,
      'auteur' => $auteur,
      'contenu' => $contenu
    ));
    return $req;
    var_dump($req);
    var_dump($contenu);
    echo 'L article a bien été ajouté !';
  }
  catch (Exception $e)
            {
              die('Erreur : ' . $e->getMessage());
            }
}
