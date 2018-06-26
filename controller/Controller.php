<?php

namespace controller;

use Exception;
use model\ComManager;
use model\PostManager;

// Controler

class Controller {

// connection à l'admin
function logAdmin() {
    if (isset($_POST["user"]) && isset($_POST["pass"])) {

        $PostManager = new PostManager();
        $result = $PostManager->admin($_POST['user']);
        $hash = password_hash($_POST['pass'], PASSWORD_DEFAULT);     
        var_dump($_POST['pass']);
        var_dump($hash);

        $correctPassword = password_verify($_POST['pass'], $hash);
        if ($correctPassword) {
            session_start();
            $_SESSION['user'] = $user;
            header('Location: index.php?action=administration');
        } else {
            echo 'login/password incorrect';
        }
    }
    else {
        echo 'Il manque un champ';
    }
}
    
    
// Affichage des articles
function listPosts() {
    $PostManager = new PostManager();
    $ComManager = new ComManager();
    $posts = $PostManager->getPosts();
    $total = $PostManager->number($nbligne);
    $totalC = $ComManager->numberC($nbligneC);
    require('view/indexView.php');
}

// Affichage d'un seul article avec commentaires
function post() {
    $PostManager = new PostManager();
    $ComManager = new ComManager();
    $post = $PostManager->getPost($_GET['id']);
    $comments = $ComManager->getComments($_GET['id']);
    $total = $PostManager->number($nbligne);
    $totalC = $ComManager->numberC($nbligneC);
    require('view/postView.php');
}

// Rédaction d'un article
function writePost($titre, $auteur, $contenu) {
    $PostManager = new PostManager();
    $affectedLines = $PostManager->writePostA($titre, $auteur, $contenu);
    if ($affectedLines === false) {
        throw new Exception('Impossible d\'ajouter un article');
    }
    else {
        header('Location: index.php?action=administration');
    }
}

// Rédaction d'un commentaire
function writeComFront($author, $comment, $idPost) {
    $ComManager = new ComManager();
    $affectedLines = $ComManager->writeComF($author, $comment, $idPost);
    if ($affectedLines === false) {
        throw new Exception('Impossible d\'ajouter un commentaire');
    }
    else {
        header('Location: index.php');
    }
}

// supprime un article
function suprPost($postId) {
    $PostManager = new PostManager();
    $affectedLines = $PostManager->deletePost($postId);
    if ($affectedLines === false) {
        throw new Exception('Impossible de supprimer un article');
    }
    else {
        header('Location: index.php?action=administration');
    }
}

// envoie vers la page d'édition d'un article
function editPostA($postId) {
    $PostManager = new PostManager();
    $dataPost = $PostManager->getPost($postId);
    require('view/editPostView.php');
}

// envoie vers la page d'édition d'un commentaire
function editComF($idCom) {
    $ComManager = new ComManager();
    $com = $ComManager->getCom($_GET['id']);
    $dataCom = $ComManager->getCom($idCom);
    require('view/editComView.php');
}

// envoie vers la page de rédaction de commentaire
function writeCom($idPostCom) {
    $idPost = $idPostCom;
    require('view/writeComView.php');
}

// supprime un commentaire
function suprCom($postId) {
    $ComManager = new ComManager();
    $affectedLines = $ComManager->deleteCom($postId);
    if ($affectedLines === false) {
        throw new Exception('Impossible de supprimer un commentaire');
    }
    else {
        header('Location: index.php?action=administration');
    }
}

// signal un commentaire
function tagCom($postId) {
    $ComManager = new ComManager();
    $affectedLines = $ComManager->tagComF($postId);
    if ($affectedLines === false) {
        throw new Exception('Impossible de signaler le commentaire');
    }
    else {
        header('Location: index.php');
    }
}


// Gérer les articles
function modifyPostBack() {
    $PostManager = new PostManager();
    $posts = $PostManager->getPosts();
    require('view/allPostView.php');
}

// Gérer les commentaires
function modifyComBack() {
    $ComManager = new ComManager();
    $comments = $ComManager->getComs();
    require('view/allComView.php');
}

// page à propos
function aboutAuthor() {
    require('view/aboutView.php');
}

// page de connection pour l'admin
function connectionAdmin() {
    require('view/connectionView.php');
}

// page d'admin
function administration() {
    require('view/adminView.php');
}

// page de rédaction d'un article
function writePostAdmin() {
    require('view/writePostView.php');
}

}

