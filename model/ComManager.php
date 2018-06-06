<?php
class ComManager

{
// Récupère les commentaires
public function getComs() {
    $db = dbConnect();
    $comments = $db->prepare('SELECT * FROM comments ORDER BY comment_date DESC');
    $comments->execute(array());
    return $comments;
}

// Récupère les commentaires
public function getComments($postId) {
    $db = dbConnect();
    $comments = $db->prepare('SELECT * FROM comments WHERE post_id = ? ORDER BY comment_date DESC');
    $comments->execute(array($postId));
    return $comments;
}

//Se connecte à la BDD
private function dbConnect() {
    $bdd = new PDO('mysql:host=localhost;dbname=boutique_ecrivain;charset=utf8', 'boutique_bdd', 'cybergoth1978');
        return $bdd;
}

}