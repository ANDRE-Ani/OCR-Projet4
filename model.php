<?php

// Lis les articles dans la BDD
function readPosts() {
$bdd = dbConnect();

try {
    $req = $bdd->query('SELECT id, titre, date, contenu, auteur FROM post ORDER BY id DESC LIMIT 8');
    return $req;
    $req->closeCursor();
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
          $req->closeCursor();
      }
      catch(Exception $e) {
          die('Erreur : '.$e->getMessage());
      }
  }
