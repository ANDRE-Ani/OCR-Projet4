<?php

// Routeur de l'application

// Redirige toutes les requêtes utilisateur vers les
// bonnes pages et actions


// Appel des différents controleurs
require_once('./controler/controler.php');

// Routes des actions et requêtes

try {
if (isset($_GET['action'])) {
    if ($_GET['action'] == 'listPosts') {
        listPosts();

    } elseif ($_GET['action'] == 'post') {
        if (isset($_GET['id']) && $_GET['id'] > 0) {
            post();
        } else {
            throw new Exception('Aucun identifiant de billet envoyé');
        }

        // écrire un article
    } elseif ($_GET['action'] == 'writePostA') {
        if (!empty($_POST['titre']) && !empty($_POST['auteur']) && !empty($_POST['contenu'])) {
            writePost($_GET['titre'], $_POST['auteur'], $_POST['contenu']);
        } else {
            throw new Exception('Tous les champs ne sont pas remplis');
        }
    }

    // écrire un commentaire
    elseif ($_GET['action'] == 'writeComA') {
        if (!empty($_POST['author']) && !empty($_POST['comment'])) {
            writeComFront($_GET['author'], $_POST['comment']);
        } else {
            throw new Exception('Tous les champs ne sont pas remplis');
        }
    }

    // supprimer un article
    elseif ($_GET['action'] == 'deletePost') {
        if (isset($_GET['id']) && $_GET['id'] > 0) {
            suprPost();
        } else {
            throw new Exception('Aucun identifiant d\'article envoyé');
        }
    }

    // supprimer un commentaire
    elseif ($_GET['action'] == 'deleteCom') {
        if (isset($_GET['id']) && $_GET['id'] > 0) {
            suprCom();
        } else {
            throw new Exception('Aucun identifiant de commentaire envoyé');
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

    elseif ($_GET['action'] == 'postCom') {
        writeCom();
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

}

catch(Exception $e) {
    echo 'Erreur : ' . $e->getMessage();
}