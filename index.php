<?php

// Routeur de l'application

// Redirige toutes les requêtes utilisateur vers les
// bonnes pages et actions

use controller\Controller;

// Appel des différents controlers
require_once("model/Manager.php");
require_once('./controller/Controller.php');

require_once("model/PostManager.php");
require_once("model/ComManager.php");

// Routes des actions et requêtes

try {
// page d'accueil avec tous les articles    
if (isset($_GET['action'])) {
    if ($_GET['action'] == 'listPosts') {
        $infos = new Controller();
        $infos->listPosts();

    // affiche un article et ses commentaires    
    } elseif ($_GET['action'] == 'post') {
        if (isset($_GET['id']) && $_GET['id'] > 0) {
            $infos = new Controller();
            $infos->post();
        } else {
            throw new Exception('Aucun identifiant de billet envoyé');
        }

        // écrire un article
    } elseif ($_GET['action'] == 'writePostA') {
        if (!empty($_POST['titre']) && !empty($_POST['auteur']) && !empty($_POST['contenu'])) {
            $infos = new Controller();
            $infos->writePost($_POST['titre'], $_POST['auteur'], $_POST['contenu']);
        } else {
            throw new Exception('Tous les champs ne sont pas remplis');
        }
    }

    // écrire un commentaire
    elseif ($_GET['action'] == 'writeComA') {
        if (!empty($_POST['author']) && !empty($_POST['comment'])) {
            $infos = new Controller();
            $infos->writeComFront($_POST['author'], $_POST['comment'], $_POST['id']);
        } else {
            throw new Exception('Tous les champs ne sont pas remplis');
        }
    }

    // connection à l'admin
    /* elseif ($_GET['action'] == 'logAdmin') {
        if ((isset($_POST['user']) && !empty($_POST['user'])) && (isset($_POST['pass']) && !empty($_POST['pass']))) {
            $infos = new Controller();
            $infos->logAdminF();
        } else {
            throw new Exception('Tous les champs ne sont pas remplis');
        }
    } */

    // envoie vers la page de rédaction d'un commentaire
    elseif ($_GET['action'] == 'postCom') {
        if (isset($_GET['id']) && $_GET['id'] > 0) {
            $infos = new Controller();
            $infos->writeCom($_GET['id']);
        } else {
            throw new Exception('Aucun identifiant de billet envoyé');
        }
    }

    // envoie vers la page d'édition d'un article
    elseif ($_GET['action'] == 'editPost') {
        if (isset($_GET['id']) && $_GET['id'] > 0) {
            $infos = new Controller();
            $infos->editPostA($_GET['id'], $_GET['auteur'], $_GET['titre'], $_GET['contenu']);
        } else {
            throw new Exception('Aucun identifiant d\'article envoyé');
        }
    }
    
    
    // supprimer un article
    elseif ($_GET['action'] == 'deletePost') {
        if (isset($_GET['id']) && $_GET['id'] > 0) {
            $infos = new Controller();
            $infos->suprPost();
        } else {
            throw new Exception('Aucun identifiant d\'article envoyé');
        }
    }


    // supprimer un commentaire
    elseif ($_GET['action'] == 'deleteCom') {
        if (isset($_GET['id']) && $_GET['id'] > 0) {
            $infos = new Controller();
            $infos->suprCom();
        } else {
            throw new Exception('Aucun identifiant de commentaire envoyé');
        }
    }

    // envoie vers la page d'administration
    elseif ($_GET['action'] == 'administration') {
        $infos = new Controller();
        $infos->administration();
    }

    // envoie vers la page de connection
    elseif ($_GET['action'] == 'connection') {
        $infos = new Controller();
        $infos->connectionAdmin();
    }

    // envoie vers la page de rédaction d'un article
    elseif ($_GET['action'] == 'writePostBack') {
        $infos = new Controller();
        $infos->writePostAdmin();
    }


    // envoie vers la page de modification d'un article
    elseif ($_GET['action'] == 'modifyPost') {
        $infos = new Controller();
        $infos->modifyPostBack();
    }

    // envoie vers la page de modification d'un commentaire
    elseif ($_GET['action'] == 'modifyCom') {
        $infos = new Controller();
        $infos->modifyComBack();
    }

    // envoie vers la page à propos
    elseif ($_GET['action'] == 'about') {
        $infos = new Controller();
        $infos->aboutAuthor();
    }


// Requête par défaut qui renvoie sur la page d'accueil
} else {
    $infos = new Controller();
    $infos->listPosts();
    }

}

catch(Exception $e) {
    echo 'Erreur : ' . $e->getMessage();
}