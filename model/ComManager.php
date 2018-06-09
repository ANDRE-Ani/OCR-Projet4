<?php


require_once("model/Manager.php");
require_once("model/PostManager.php");

class ComManager extends Manager

{
// Récupère les commentaires
public function getComs() {
    $db = $this->dbConnect();
    $comments = $db->prepare('SELECT * FROM comments ORDER BY comment_date DESC');
    $comments->execute(array());
    return $comments;
}

// Ecris le commentaire
public function writeComF($author, $comment) {
    $bdd = $this->dbConnect();
    $comments = $bdd->prepare('INSERT INTO comments(author, comment) VALUES(?, ?)');
    $affectedLines = $comments->execute(array($author, $comment));
    return $affectedLines;
}

// Récupère les commentaires
public function getComments($postId) {
    $db = $this->dbConnect();
    $comments = $db->prepare('SELECT * FROM comments WHERE post_id = ? ORDER BY comment_date DESC');
    $comments->execute(array($postId));
    return $comments;
}

// Supprime un commentaire
public function deleteCom($postId) {
    $bdd = $this->dbConnect();
    $comment = $bdd->prepare("DELETE FROM comments WHERE id=".$_GET['id']);
    $affectedLines = $comment->execute(array($postId));
    return $affectedLines;
}


}