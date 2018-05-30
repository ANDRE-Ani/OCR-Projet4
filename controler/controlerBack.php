<?php

require('model/modelBack.php');

function writePostAdmin() {
    require('view/writePostView.php');
}

function writePostBack() {
  require('view/modifyPostView');
}

function listPostsBack() {
    $posts = getPosts();
    require('view/indexView.php');
}


function postBack() {
    $post = getPost($_GET['id']);
    $comments = getComments($_GET['id']);
    require('view/postView.php');
}


function writePostA($titre, $auteur, $contenu) {
    $affectedLines = postArticle($titre, $auteur, $contenu);

    if ($affectedLines === false) {
        die('Impossible d\'ajouter un article');
    }
    else {
        header('Location: view/adminView.php');
    }
    require('view/adminView.php');
}
