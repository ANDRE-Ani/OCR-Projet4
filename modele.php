<?php

function lireBillets()

{
// Se connecte à la BDD
    try
  {
    $bdd = new PDO('mysql:host=localhost;dbname=boutique_ecrivain;charset=utf8', 'boutique_bdd', 'cybergoth1978');
  }
  catch (Exception $e)
  {
    die('Erreur : ' . $e->getMessage());
  }

    // Lis les articles dans la BDD
    $req = $bdd->query('SELECT id, titre, date, contenu, auteur FROM post ORDER BY id DESC LIMIT 5');

    return $req;

}

?>
