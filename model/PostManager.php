<?php


require_once("model/Manager.php");
require_once("model/ComManager.php");

class PostManager extends Manager

{
// Ecris l'article dans la BDD
public function writePostA($titre, $auteur, $contenu) {
    $bdd = $this->dbConnect();
    $post = $bdd->prepare('INSERT INTO post(titre, auteur, contenu) VALUES(?, ?, ?)');
    $affectedLines = $post->execute(array($titre, $auteur, $contenu));
    return $affectedLines;
}

// Supprime un article
public function deletePost($postId) {
    $bdd = $this->dbConnect();
    $post = $bdd->prepare("DELETE FROM post WHERE id=".$_GET['id']);
    $affectedLines = $post->execute(array($postId));
    return $affectedLines;
}


// Récupère les articles
public function getPosts() {
    $db = $this->dbConnect();
    $req = $db->query('SELECT * FROM post ORDER BY date DESC');
    return $req;
    
}

// Récupère un article
public function getPost($postId) {
    $db = $this->dbConnect();
    $req = $db->prepare('SELECT * FROM post WHERE id = ?');
    $req->execute(array($postId));
    $post = $req->fetch();
    return $post;
}

}