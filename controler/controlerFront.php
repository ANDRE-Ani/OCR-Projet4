<?php

require_once('model/model.php');

// Fonction de connection pour l'admin
/*function connectionAdmin() {
    require('view/connectionView.php');
}


function listPosts() {
    $posts = getPosts();
    require('view/indexView.php');
}


function post() {
    $post = getPost($_GET['id']);
    $comments = getComments($_GET['id']);
    require('view/postView.php');
} */

function aboutAuthor() {
    require('view/aboutView.php');
}
