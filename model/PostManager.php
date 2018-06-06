<?php
class PostManager

{
// Ecris l'article dans la BDD
public function writePost($titre, $auteur, $contenu) {
    $bdd = $this->dbConnect();
    $comments = $bdd->prepare('INSERT INTO post(titre, auteur, contenu) VALUES(?, ?, ?)');
    $affectedLines = $comments->execute(array($titre, $auteur, $contenu));
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

//Se connecte à la BDD
private function dbConnect() {
    $bdd = new PDO('mysql:host=localhost;dbname=boutique_ecrivain;charset=utf8', 'boutique_bdd', 'cybergoth1978');
        return $bdd;
}

}