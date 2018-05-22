<?php

// Récupère les articles
function getPosts()
{
    $db = dbConnect();
    $req = $db->query('SELECT id, titre, contenu, date FROM post ORDER BY date DESC LIMIT 0, 8');

    return $req;
}


// Récupère un article
function getPost($postId)
{
    $db = dbConnect();
    $req = $db->prepare('SELECT id, titre, contenu, auteur, date FROM post WHERE id = ?');
    $req->execute(array($postId));
    $post = $req->fetch();
    return $post;
}

// Récupère les commentaires
function getComments($postId)
{
    $db = dbConnect();
    $comments = $db->prepare('SELECT id, post_id, comment, comment_date, author FROM comments WHERE post_id = ? ORDER BY comment_date DESC');
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
