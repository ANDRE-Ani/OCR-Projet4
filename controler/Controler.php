<?php

namespace controller;

use model\ComManager;
use model\PostManager;

// Controler


class Controller {

    // connection à l'admin
    function logAdminA() {
        $PostManager = new PostManager();
        $resultat = $PostManager->admin();
        $isPasswordCorrect = password_verify($_POST['pass'], $resultat['pass']);


if (!$resultat) {
    echo 'Mauvais identifiant ou mot de passe !';
}

else {
    if ($isPasswordCorrect) {
        session_start();
        $_SESSION['id'] = $resultat['id'];
        $_SESSION['user'] = $user;
        echo 'Vous êtes connecté !';
    }
    else {
        echo 'Mauvais identifiant ou mot de passe !';
    }
}
        require('view/adminView.php');
    }

    
// Affichage des articles
function listPosts() {
    $PostManager = new PostManager();
    $posts = $PostManager->getPosts();
    require('view/indexView.php');
}

// Affichage d'un seul article avec commentaires
function post() {
    $PostManager = new PostManager();
    $ComManager = new ComManager();
    $post = $PostManager->getPost($_GET['id']);
    $comments = $ComManager->getComments($_GET['id']);
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
    $post = $PostManager->editPost($postId);
    require('view/editPostView.php');
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

// Gérer les articles
function modifyPostBack() {
    $PostManager = new PostManager();
    $posts = $PostManager->getPosts();
    require('view/modifyPostView.php');
}

// Gérer les commentaires
function modifyComBack() {
    $ComManager = new ComManager();
    $comments = $ComManager->getComs();
    require('view/modifyComView.php');
}

// envoie vers la page de rédaction de commentaire
function writeCom($idPostCom) {
    $idPost = $idPostCom;
    require('view/writeComView.php');
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

