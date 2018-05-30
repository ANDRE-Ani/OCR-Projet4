<?php

// Ecris l'article dans la BDD
function writePost($titre, $auteur, $contenu)
{
    $bdd = dbConnect();

    $req = $bdd->prepare('INSERT INTO post(titre, contenu, auteur)VALUES(:titre, :contenu, :auteur)');
    /* $req->bindValue(':titre','1 titre',PDO::PARAM_STR);
    $req->bindValue(':contenu','1 contenu', PDO::PARAM_STR);
    $req->bindValue(':auteur', '1 auteur', PDO::PARAM_STR);
    $req->execute(); */
    $affectedLines = $req->execute(array($auteur, $titre, $contenu));
    echo 'L article a bien été ajouté ! ';
    return $affectedLines;
}



// Récupère les articles
function getPosts() {
    $db = dbConnect();
    $req = $db->query('SELECT * FROM post ORDER BY date DESC LIMIT 0, 8');
    return $req;
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
    $comments = $db->prepare('SELECT * FROM comments WHERE post_id = ?ORDER BY comment_date DESC');
    $comments->execute(array($postId));
    return $comments;
}


//Se connecte à la BDD
  function dbConnect()
  {
      try {
          $bdd = new PDO('mysql:host = localhost; dbname = boutique_ecrivain; charset = utf8', 'boutique_bdd', 'cybergoth1978');
          return $bdd;
          $req->closeCursor();
      } catch (Exception $e) {
          die('Erreur:'.$e->getMessage());
      }
  }
