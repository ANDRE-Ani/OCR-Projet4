<?php


// Model du site
// Contient toutes les actions et requêtes pour la BDD


// Ecris l'article dans la BDD
function writePost() {
    $bdd = dbConnect();
    
    try {
        $req = $bdd->prepare('INSERT INTO post(titre, contenu, auteur) VALUES(:titre, :contenu, :auteur)');
        $req->bindValue(':titre', $titre, PDO::PARAM_STR);
        $req->bindValue(':contenu', $contenu, PDO::PARAM_STR);
        $req->bindValue(':auteur', $auteur, PDO::PARAM_STR);
        $req->execute();
            echo 'L\'article a bien été ajouté ';
        return $req;
        }
    catch (Exception $e)
  {
    die('Erreur : ' . $e->getMessage());
  }
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
    $coms = $db->query('SELECT * FROM comments ORDER BY date DESC');
    return $coms;
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
