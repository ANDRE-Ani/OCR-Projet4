<?php

require('controler/controler.php');

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
        if (!empty($_POST['titre']) && !empty($_POST['auteur']) && !empty($_POST['contenu'])) {
            writePostA($_GET['titre'], $_GET['auteur'], $_GET['contenu']);
        } else {
            echo 'Erreur : tous les champs ne sont pas remplis';
        }
    }
    
} else {
    listPosts();
}
