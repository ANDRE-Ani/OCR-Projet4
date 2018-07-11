<?php

// manager pour les requêtes BDD gérant les commentaires

namespace model;

use PDO;
use model\Manager;

class ComManager extends Manager

{
// Récupère les commentaires
public function getComs() {
    $db = $this->dbConnect();
    $comments = $db->prepare('SELECT id, post_id, author, comment, statut, comment_date FROM comments ORDER BY comment_date DESC');
    $comments->execute(array());
    return $comments;
}

// comptage des commentaires
public function numberC() {
    $db = $this->dbConnect();
    $req = $db->query('SELECT COUNT(id) as countid FROM comments'); 
    $req->execute(array());
    $nbligneC = $req->fetch();
    return $nbligneC;
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
    $comments = $db->prepare('SELECT * FROM comments WHERE post_id = ? AND statut = "valide" ORDER BY comment_date DESC');
    $comments->execute(array($postId));
    return $comments;
}

// comptage des commentaires d'un article
/* public function numberCP($postId) {
    $db = $this->dbConnect();
    $req = $db->query('SELECT COUNT(id) as countid FROM comments'); 
    $req->execute(array($postId));
    $nbrCom = $req->fetch();
    return $nbrCom;
} */

// Supprime un commentaire
public function deleteCom($postId) {
    $bdd = $this->dbConnect();
    $comment = $bdd->prepare("DELETE FROM comments WHERE id=".$_GET['id']);
    $affectedLines = $comment->execute(array($postId));
    return $affectedLines;
}

// Edite un commentaire
public function editComF($id, $comment, $statut) {
    $db = $this->dbConnect();
    $req = $db->prepare('UPDATE comments SET comment = ?, statut = ? WHERE id = ?');
    $com = $req->execute(array($comment, $statut, $id));
    return $com;
}

// signal un commentaire
public function tagComF($postId) {
    $bdd = $this->dbConnect();
    $comment = $bdd->prepare("UPDATE comments SET statut='signale' WHERE id=".$_GET['id']);
    $affectedLines = $comment->execute(array($postId));
    return $affectedLines;
}

}