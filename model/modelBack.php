<?php

// Ecris l'article dans la BDD
function writePost() {
    $bdd = dbConnect();
    
    $req = $bdd->prepare('INSERT INTO post(titre, contenu, auteur) VALUES(:titre, :contenu, :auteur)');
      $req->bindValue(':titre','1 titre',PDO::PARAM_STR);
      $req->bindValue(':contenu','1 contenu', PDO::PARAM_STR);
      $req->bindValue(':auteur', '1 auteur', PDO::PARAM_STR);
      $req->execute();
        echo 'L article a bien été ajouté !';
        return $req;
    }


// Récupère les articles
function getPostsBack() {
    $db = dbConnect();
    $req = $db->query('SELECT * FROM post ORDER BY date DESC LIMIT 0, 8');
    return $req;
}


// Récupère les commentaires
function getCommentsBack($postId) {
    $db = dbConnect();
    $comments = $db->prepare('SELECT * FROM comments WHERE post_id = ? ORDER BY comment_date DESC');
    $comments->execute(array($postId));
    return $comments;
}


//Se connecte à la BDD
  function dbConnectBack() {
      try {
          $bdd = new PDO('mysql:host=localhost;dbname=boutique_ecrivain;charset=utf8', 'boutique_bdd', 'cybergoth1978');
          return $bdd;
          $req->closeCursor();
      }
      catch(Exception $e) {
          die('Erreur : '.$e->getMessage());
      }
  }