<?php
// Controler


require_once('./model/PostManager.php');
require_once('./model/ComManager.php');


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
function writePostA($titre, $auteur, $contenu) {
    $PostManager = new PostManager();
    $affectedLines = $PostManager->writePost($titre, $auteur, $contenu);
    if ($affectedLines === false) {
        throw new Exception('Impossible d\'ajouter un article');
    }
    else {
        header('Location: index.php?action=administration');
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


function aboutAuthor() {
    require('view/aboutView.php');
}

// Fonction de connection pour l'admin
function connectionAdmin() {
    require('view/connectionView.php');
}

function administration() {
    require('view/adminView.php');
}

// Rédaction d'un article
function writePostAdmin() {
    require('view/writePostView.php');
}