<?php
// Controler

require_once('./model/PostManager.php');
require_once('./model/ComManager.php');


// Affichage des articles
function listPosts() {
    $postManager = new PostManager();
    $posts = $PostManager->getPosts();
    require('view/indexView.php');
}

// Affichage d'un seul article avec commentaires
function post() {
    $postManager = new PostManager();
    $commentManager = new CommentManager();
    $post = $PostManager->getPost($_GET['id']);
    $comments = $ComManager->getComments($_GET['id']);
    require('view/postView.php');
}

// Rédaction d'un article
function writePostA($titre, $auteur, $contenu) {
    $postManager = new PostManager();
    $affectedLines = $PostManager->postComment($titre, $auteur, $contenu);
    if ($affectedLines === false) {
        throw new Exception('Impossible d\'ajouter le commentaire');
    }
    else {
        
        header('Location: index.php?action=administration');
    }
}

// Gérer les articles
function modifyPostBack() {
    $postManager = new PostManager();
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