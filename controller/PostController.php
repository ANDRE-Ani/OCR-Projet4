<?php

namespace controller;

use Exception;
use model\ComManager;
use model\PostManager;
use model\UserManager;

// Controler post

class PostController extends Controller
{

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
        throw new Exception('Impossible d\'éditer l\'article');
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

// envoie vers la page d'édition d'un article
function viewEditPostB($postId) {
    $PostManager = new PostManager();
    $dataPost = $PostManager->getPost($postId);
    require('view/editPostView.php');
}

// Gérer les articles
function allPostBack() {
    $PostManager = new PostManager();
    $posts = $PostManager->getPosts();
    require('view/allPostView.php');
}

// envoie vers la page de rédaction d'un article
function viewWritePost() {
    require('view/writePostView.php');
}


}