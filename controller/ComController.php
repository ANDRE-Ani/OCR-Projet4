<?php

namespace controller;

use Exception;
use model\ComManager;
use model\PostManager;
use model\UserManager;

// Controler commentaires

class ComController extends Controller
{
// Gérer les commentaires
function allComBack() {
    $ComManager = new ComManager();
    $comments = $ComManager->getComs();
    require('view/allComView.php');
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

// envoie vers la page de rédaction de commentaire
function viewWriteComBack($idPostCom) {
    $idPost = $idPostCom;
    require('view/writeComView.php');
}

// envoie vers la page d'édition d'un commentaire
function viewEditComB($idCom) {
    $ComManager = new ComManager();
    $com = $ComManager->getCom($idCom);
    require('view/editComView.php');
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
function editComFront($statut, $comment) {
    $ComManager = new ComManager();
    $affectedLines = $ComManager->editComF($statut, $comment);
    if ($affectedLines === false) {
        throw new Exception('Impossible d\'ajouter un commentaire');
    }
    else {
        header('Location: index.php');
    }
}


}