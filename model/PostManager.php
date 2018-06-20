<?php

namespace model;

use model\Manager;

class PostManager extends Manager

{
    // vérifie le login
public function admin() {
    $bdd = $this->dbConnect();
    $users = $bdd->prepare('SELECT pass FROM adminU WHERE user = :user');
    $users->bindParam(':user', $_POST["user"]);
	$users->execute();
    $result = $users->fetch();
    $hash = $result[0];
}


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
    $req = $db->query('SELECT id, titre, contenu, auteur, DATE_FORMAT(post_date, "%d/%m/%Y à %Hh%imin") AS post_date FROM post ORDER BY post_date DESC');
    return $req;
    
}

// Récupère un article
public function getPost($postId) {
    $db = $this->dbConnect();
    $req = $db->prepare('SELECT id, titre, contenu, auteur, DATE_FORMAT(post_date, "%d/%m/%Y à %Hh%imin") AS post_date FROM post WHERE id = ?');
    $req->execute(array($postId));
    $post = $req->fetch();
    return $post;
}

// Edite un article
public function editPost() {
    $db = $this->dbConnect();
    // $req = $db->prepare('SELECT id, titre, contenu, auteur, DATE_FORMAT(post_date, "%d/%m/%Y à %Hh%imin") AS post_date FROM post WHERE id = ?');
    
    $req = $db->prepare('UPDATE post SET titre = $titre, contenu= $contenu WHERE id= ?');
    
    $req->execute(array($postId));
    $post = $req->fetch();
    return $post;
}

}