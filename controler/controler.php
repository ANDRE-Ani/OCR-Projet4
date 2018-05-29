<?php

require('model/model.php');

function listPosts() {
    $posts = getPosts();
    require('view/indexView.php');
}

function post() {
    $post = getPost($_GET['id']);
    $comments = getComments($_GET['id']);
    require('view/postView.php');
}

function writePostA($titre, $auteur, $contenu) {
  $affectedLines = writePost($titre, $auteur, $contenu);
    if ($affectedLines === false) {
        die('Impossible d\'ajouter le commentaire !');
    }
    else {
        header('Location: index.php?action=writePost');
    }

    require('view/adminView.php');
}
