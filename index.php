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


    // édite un article
    elseif ($_GET['action'] == 'editPost') {
     
        if (!empty($_POST['titre']) && !empty($_POST['auteur']) && !empty($_POST['contenu'])) {
        $infos = new Controller();
        $infos->editPostBack($_POST['titre'], $_POST['auteur'], $_POST['contenu']);
        var_dump('auteur');
        var_dump('contenu');
        die();    
    
    }   else {
        throw new Exception('Tous les champs ne sont pas remplis');
    }
}


    // écrire un commentaire
    elseif ($_GET['action'] == 'writeComA') {
        if (!empty($_POST['author']) && !empty($_POST['comment'])) {
            $infos = new Controller();
            $infos->writeComFront($_POST['author'], $_POST['comment'], $_GET['post_id']);
        } else {
            throw new Exception('Tous les champs ne sont pas remplis');
        }
    }


    // édition d'un commentaire
    elseif ($_GET['action'] == 'editComBack') {
        /*var_dump($_POST['comment']);
        var_dump($_POST['statut']);
        var_dump($_POST['id']);
        die();*/
        if (!empty($_POST['statut']) && !empty($_POST['comment']) && !empty($_POST['id'])) {
            $infos = new Controller();
            $infos->editComFront($_POST['statut'], $_POST['comment'], $_GET['post_id']);
        } else {
            throw new Exception('Tous les champs ne sont pas remplis pour l\'édition');
        }
    }


    // connection à l'admin
    elseif ($_GET['action'] == 'logAdminF') {
        if ((isset($_POST['user']) && !empty($_POST['user'])) && (isset($_POST['pass']) && !empty($_POST['pass']))) {
            $infos = new Controller();
            $infos->logAdmin();
        } else {
            throw new Exception('Tous les champs ne sont pas remplis');
        }
    }


    // envoie vers la page de rédaction d'un commentaire
    elseif ($_GET['action'] == 'viewWriteCom') {
        if (isset($_GET['id']) && $_GET['id'] > 0) {
            $infos = new Controller();
            $infos->viewWriteComBack($_GET['id']);
        } else {
            throw new Exception('Aucun identifiant de billet envoyé');
        }
    }

    // envoie vers la page d'édition d'un article
    elseif ($_GET['action'] == 'viewEditPost') {
        if (isset($_GET['id']) && $_GET['id'] > 0) {
            $infos = new Controller();
            $infos->viewEditPostB($_GET['id']);
        } else {
            throw new Exception('Aucun identifiant d\'article envoyé pour édition');
        }
    }
    
    // envoie vers la page d'édition d'un commentaire
    elseif ($_GET['action'] == 'viewEditCom') {
        if (isset($_GET['id']) && $_GET['id'] > 0) {
            $infos = new Controller();
            $infos->viewEditComB($_GET['id']);
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
    elseif ($_GET['action'] == 'viewWritePost') {
        $infos = new Controller();
        $infos->viewWritePost();
    }


    // envoie vers la page de gestion des articles
    elseif ($_GET['action'] == 'viewAllPost') {
        $infos = new Controller();
        $infos->allPostBack();
    }

    // envoie vers la page de gestion des commentaires
    elseif ($_GET['action'] == 'viewAllCom') {
        $infos = new Controller();
        $infos->allComBack();
    }

    // envoie vers la page à propos
    elseif ($_GET['action'] == 'about') {
        $infos = new Controller();
        $infos->aboutAuthor();
    }

    // signalement d'un commentaire
    elseif ($_GET['action'] == 'signalCom') {
        if (isset($_GET['id']) && $_GET['id'] > 0) {
            $infos = new Controller();
            $infos->signalComUser($_GET['id']);
        } else {
            throw new Exception('Aucun identifiant de commentaire envoyé');
        }
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