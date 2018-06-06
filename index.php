<?php

// Routeur de l'application

// Redirige toutes les requêtes utilisateur vers les
// bonnes pages et actions


// Appel des différents controleurs
require('controler/controlerBack.php');
require('controler/controlerFront.php');

// Routes des actions et requêtes

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
            writePost($_GET['titre'], $_POST['auteur'], $_POST['contenu']);
        } else {
            echo 'Erreur : tous les champs ne sont pas remplis !';
        }
    }

    elseif ($_GET['action'] == 'administration') {
        administration();
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

    elseif ($_GET['action'] == 'modifyCom') {
        modifyComBack();
    }

    elseif ($_GET['action'] == 'about') {
        aboutAuthor();
    }


// Requête par défaut qui renvoie sur la page d'accueil
} else {
    listPosts();
}
