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
        $result = $PostManager->admin($_POST['user'], $_POST['pass']);
        // $hash = password_hash($_POST['pass'], PASSWORD_DEFAULT);     

        $correctPassword = password_verify($_POST['pass'], $hash);
        if ($result != false) {
        // if ($correctPassword) {
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


// édition d'un article
function editPostBack($titre, $auteur, $contenu) {
    $PostManager = new PostManager();
    

    $affectedLines = $PostManager->editPost($titre, $auteur, $contenu);
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

// édition d'un commentaire
function editComFront($statut, $comment, $idPost) {
    $ComManager = new ComManager();
    $affectedLines = $ComManager->editComF($statut, $comment, $idPost);
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
function viewEditPostB($postId) {
    $PostManager = new PostManager();
    $dataPost = $PostManager->getPost($postId);
    require('view/editPostView.php');
}

// envoie vers la page d'édition d'un commentaire
function viewEditComB($idCom) {
    $ComManager = new ComManager();
    $com = $ComManager->getCom($idCom);
    require('view/editComView.php');
}

// envoie vers la page de rédaction de commentaire
function viewWriteComBack($idPostCom) {
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

// signaler un commentaire
function signalComUser($postId) {
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
function allPostBack() {
    $PostManager = new PostManager();
    $posts = $PostManager->getPosts();
    require('view/allPostView.php');
}

// Gérer les commentaires
function allComBack() {
    $ComManager = new ComManager();
    $comments = $ComManager->getComs();
    require('view/allComView.php');
}

// page à propos
function aboutAuthor() {
    require('view/aboutView.php');
}

// envoie vers la page de connection pour l'admin
function connectionAdmin() {
    require('view/connectionView.php');
}

// envoie vers la page d'administration
function administration() {
    require('view/adminView.php');
}

// envoie vers la page de rédaction d'un article
function viewWritePost() {
    require('view/writePostView.php');
}

}

