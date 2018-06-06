<?php


// Model du site
// Contient toutes les actions et requêtes pour la BDD


// Ecris l'article dans la BDD
function writePost($titre, $auteur, $contenu) {
    $bdd = dbConnect();
    $comments = $bdd->prepare('INSERT INTO post(titre, auteur, contenu) VALUES(?, ?, ?)');
    $affectedLines = $comments->execute(array($titre, $auteur, $contenu));
    return $affectedLines;
}

// Récupère les articles
function getPosts() {
    $db = dbConnect();
    $req = $db->query('SELECT * FROM post ORDER BY date DESC');
    return $req;
}

// Récupère les commentaires
function getComs() {
    $db = dbConnect();
    $comments = $db->prepare('SELECT * FROM comments ORDER BY comment_date DESC');
    $comments->execute(array());
    return $comments;
}

// Récupère un article
function getPost($postId) {
    $db = dbConnect();
    $req = $db->prepare('SELECT * FROM post WHERE id = ?');
    $req->execute(array($postId));
    $post = $req->fetch();
    return $post;
}

// Récupère les commentaires
function getComments($postId) {
    $db = dbConnect();
    $comments = $db->prepare('SELECT * FROM comments WHERE post_id = ? ORDER BY comment_date DESC');
    $comments->execute(array($postId));
    return $comments;
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
