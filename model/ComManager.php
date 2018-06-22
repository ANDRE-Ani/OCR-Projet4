<?php

namespace model;

use model\Manager;

class ComManager extends Manager

{
// Récupère les commentaires
public function getComs() {
    $db = $this->dbConnect();
    $comments = $db->prepare('SELECT id, post_id, author, comment, statut, DATE_FORMAT(comment_date, "%d/%m/%Y à %Hh%imin") AS comment_date FROM comments ORDER BY comment_date DESC');
    $comments->execute(array());
    return $comments;
}

// Récupère un commentaire
public function getCom($comId) {
    $db = $this->dbConnect();
    $req = $db->prepare('SELECT id, post_id, author, comment, comment_date, statut FROM comments WHERE id = ?');
    $req->execute(array($comId));
    $com = $req->fetch();
    return $com;
}

// Ecris le commentaire
public function writeComF($author, $comment, $idPost) {
    $bdd = $this->dbConnect();
    $comments = $bdd->prepare('INSERT INTO comments(author, comment, post_id, statut) VALUES(?, ?, ?, "en attente")');
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

// Edite un commentaire
public function editCom($postId) {
    $db = $this->dbConnect();
    $req = $db->prepare('UPDATE comments SET contenu = $contenu, statut = $statut WHERE id='.$_GET['id']);
    $req->execute(array($postId));
    $com = $req->fetch();
    return $com;
}

// signal un commentaire
public function tagComF($postId) {
    $bdd = $this->dbConnect();
    $comment = $bdd->prepare("UPDATE comments SET statut=1 WHERE id=".$_GET['id']);
    $affectedLines = $comment->execute(array($postId));
    return $affectedLines;
}

}