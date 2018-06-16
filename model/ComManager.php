<?php

namespace model;

use model\Manager;

class ComManager extends Manager

{
// Récupère les commentaires
public function getComs() {
    $db = $this->dbConnect();
    $comments = $db->prepare('SELECT id, post_id, author, comment, DATE_FORMAT(comment_date, "%d/%m/%Y à %Hh%imin") AS comment_date FROM comments ORDER BY comment_date DESC');
    $comments->execute(array());
    return $comments;
}

// Ecris le commentaire
public function writeComF($author, $comment, $idPost) {
    $bdd = $this->dbConnect();
    $comments = $bdd->prepare('INSERT INTO comments(author, comment, id) VALUES(?, ?, ?)');
    $affectedLines = $comments->execute(array($author, $comment, $idPost)); 
    return $affectedLines;
}

// Récupère les commentaires d'un article
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