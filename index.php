<?php

require('controler/controlerBack.php');

if (isset($_GET['action'])) {
    if ($_GET['action'] == 'listPosts') {
        listPosts();

    } elseif ($_GET['action'] == 'post') {
        if (isset($_GET['id']) && $_GET['id'] > 0) {
            post();
        } else {
            echo 'Erreur : aucun identifiant de billet envoyé';
        }

    } elseif ($_GET['action'] == 'writePostA') {
        if (!empty($_POST['author']) && !empty($_POST['comment'])) {
            writePostA($_GET['titre'], $_POST['auteur'], $_POST['contenu']);
        } else {
            echo 'Erreur : tous les champs ne sont pas remplis !';
        }
    }

    elseif ($_GET['action'] == 'connection') {
        connectionAdmin();
    }

    elseif ($_GET['action'] == 'writePostBack') {
        writePostAdmin();
    }

    elseif ($_GET['action'] == 'modifyPost') {
        modifyPostBack();
    }

    elseif ($_GET['action'] == 'editPosts') {
        modifyPostView();
    }

    elseif ($_GET['action'] == 'connection') {
        connectionAdmin();
    }







} else {
    listPosts();
}
