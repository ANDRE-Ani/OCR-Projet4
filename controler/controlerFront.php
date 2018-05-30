<?php

require('model/modelFront.php');

function connectionAdmin() {
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
}

<<<<<<< HEAD:controler/controlerFront.php
=======
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
>>>>>>> 18d5166f7f07009b2874e7d920c2fe2bf426caee:controler/controler.php
