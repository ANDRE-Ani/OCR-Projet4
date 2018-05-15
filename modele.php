<?php

function lireBillets() {
$bdd = dbConnect();

try {
    // Lis les articles dans la BDD
    $req = $bdd->query('SELECT id, titre, date, contenu, auteur FROM post ORDER BY id DESC LIMIT 5');
    return $req;
  }
  catch (Exception $e) {
              die('Erreur : ' . $e->getMessage());
            }
}



// Envoie requête dans la BDD
function lireBdd() {

$bdd = dbConnect();

try {
  // Ecris l'article dans la BDD
    $env = $bdd->prepare('INSERT INTO post(titre, contenu, auteur) VALUES(:titre, :contenu, :auteur)');
    $env->execute(array(
      'titre' => $titre,
      'auteur' => $auteur,
      'contenu' => $contenu
    ));
    $env = true;
    return $env;
    echo 'L article a bien été ajouté !';
  }
  catch (Exception $e)
            {
              die('Erreur : ' . $e->getMessage());
            }
}



//Se connecte à la BDD
  function dbConnect()
  {
      try {
          $bdd = new PDO('mysql:host=localhost;dbname=boutique_ecrivain;charset=utf8', 'boutique_bdd', 'cybergoth1978');
          return $bdd;
      }
      catch(Exception $e) {
          die('Erreur : '.$e->getMessage());
      }
  }
