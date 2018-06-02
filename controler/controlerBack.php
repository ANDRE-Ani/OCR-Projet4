<?php
// Controler du back office du blog

require('model/model.php');

// Fonction de connection pour l'admin
function connectionAdmin() {
    require('view/connectionView.php');
}

// Affichage des articles
function listPosts() {
    $posts = getPosts();
    require('view/indexView.php');
}

// Affichage d'un seul article avec commentaires
function post() {
    $post = getPost($_GET['id']);
    $comments = getComments($_GET['id']);
    require('view/postView.php');
}

// Rédaction d'un article
function writePostA($titre, $auteur, $contenu) {
    /* $affectedLines = postArticleAdmin($titre, $auteur, $contenu);
    
    if ($affectedLines === false) {
        die('Impossible d\'ajouter un article');
    }
    else { */
     
        header('Location: view/adminView.php');
    /* } */
    require('view/adminView.php');
}

function administration() {
    require('view/adminView.php');
}

// Rédaction d'un article
function writePostAdmin() {
    require('view/writePostView.php');
}

// Gérer les articles
function modifyPostBack() {
    $posts = getPosts();
    require('view/modifyPostView.php');
}

// Gérer les commentaires
function modifyComBack() {
    $coms = getComs();
    require('view/modifyComView.php');
}
