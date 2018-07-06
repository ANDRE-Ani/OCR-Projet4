<?php

// Routeur de l'application

// Redirige toutes les requêtes utilisateur vers les
// bonnes pages et actions

use controller\ComController;
use controller\Controller;
use controller\PostController;
use controller\UserController;

// Appel des différents controlers
require_once "model/Manager.php";
require_once './controller/Controller.php';
require_once './controller/UserController.php';
require_once './controller/PostController.php';
require_once './controller/ComController.php';

// appel des model
require_once "model/PostManager.php";
require_once "model/ComManager.php";
require_once "model/UserManager.php";

// Routes des actions et requêtes

try {

/* $url2 = $_SERVER['SCRIPT_NAME'];
var_dump($url2);
die(); */

$url = $_SERVER['SCRIPT_NAME'];
$url2 = explode('/', $_SERVER['REQUEST_URI']);
$url3 = explode('/', $_SERVER['SCRIPT_NAME']);
var_dump($url);
var_dump($url2);
var_dump($url3);
die();

    // if (isset($_GET['action'])) {

        switch ($url) {
            // page d'accueil avec tous les articles
            case ($url == 'listPosts'):
                $infos = new PostController();
                $infos->listPosts();
                
                break;

            case ($_GET['action'] == 'post'):
                // affiche un article et ses commentaires
                if (isset($_GET['id']) && $_GET['id'] > 0) {
                    $infos = new PostController();
                    $infos->post();
                } else {
                    throw new Exception('Aucun identifiant de billet envoyé');
                }
                break;

            case ($_GET['action'] == 'writePostA'):
                // écrire un article
                if (!empty($_POST['titre']) && !empty($_POST['auteur']) && !empty($_POST['contenu'])) {
                    $infos = new PostController();
                    $infos->writePost($_POST['titre'], $_POST['auteur'], $_POST['contenu']);
                } else {
                    throw new Exception('Tous les champs ne sont pas remplis');
                }
                break;

            case ($_GET['action'] == 'editPost'):
                // édite un article
                if (isset($_GET['id']) && $_GET['id'] > 0) {
                    if (!empty($_POST['titre']) && !empty($_POST['auteur']) && !empty($_POST['contenu'])) {
                        $infos = new PostController();
                        $infos->editPostBack($_GET['id'], $_POST['titre'], $_POST['auteur'], $_POST['contenu']);
                    } else {
                        throw new Exception('Tous les champs ne sont pas remplis');
                    }
                } else {
                    throw new Exception('Aucun identifiant de billet envoyé');
                }
                break;

            case ($_GET['action'] == 'editComBack'):
                // édition d'un commentaire
                if (isset($_GET['id']) && $_GET['id'] > 0) {
                    if (!empty($_POST['contenu']) && !empty($_POST['statut'])) {
                        $infos = new ComController();
                        $infos->editComFront($_GET['id'], $_POST['contenu'], $_POST['statut']);
                    } else {
                        throw new Exception('Tous les champs ne sont pas remplis pour l\'édition');
                    }
                } else {
                    throw new Exception('Aucun identifiant de billet envoyé');
                }
                break;

            case ($_GET['action'] == 'editUserL'):
                // édition d'un utilisateur
                if (isset($_GET['id']) && $_GET['id'] > 0) {
                    if (!empty($_GET['id']) && !empty($_POST['user'] && !empty($_POST['mail']))) {
                        $infos = new UserController();
                        $infos->editUserBack($_POST['user'], $_POST['mail'], $_GET['id']);
                    } else {
                        throw new Exception('Tous les champs ne sont pas remplis pour l\'édition');
                    }
                } else {
                    throw new Exception('Aucun identifiant d\'utilisateur envoyé');
                }
                break;

            case ($_GET['action'] == 'writeComA'):
                // écrire un commentaire
                if (!empty($_POST['author']) && !empty($_POST['comment'])) {
                    $infos = new ComController();
                    $infos->writeComFront($_POST['author'], $_POST['comment'], $_GET['post_id']);
                } else {
                    throw new Exception('Tous les champs ne sont pas remplis');
                }
                break;

            case ($_GET['action'] == 'logAdminF'):
                // connection à l'admin
                if ((isset($_POST['user']) && !empty($_POST['user'])) && (isset($_POST['pass']) && !empty($_POST['pass']))) {
                    $infos = new UserController();
                    $infos->logAdmin();
                } else {
                    throw new Exception('Tous les champs ne sont pas remplis');
                }
                break;

            case ($_GET['action'] == 'createUser'):
                // création de compte
                if (!empty($_POST['user']) && !empty($_POST['mail']) && !empty($_POST['pass']) && !empty($_POST['pass2']) && ($_POST['pass']) == ($_POST['pass2'])) {
                    $infos = new UserController();
                    $infos->creationUserA($_POST['user'], $_POST['mail'], $_POST['pass']);
                } else {
                    throw new Exception('Tous les champs ne sont pas remplis ou les mots de passe ne correspondent pas');
                }
                break;

            case ($_GET['action'] == 'viewWriteCom'):
                // envoie vers la page de rédaction d'un commentaire
                if (isset($_GET['id']) && $_GET['id'] > 0) {
                    $infos = new ComController();
                    $infos->viewWriteComBack($_GET['id']);
                } else {
                    throw new Exception('Aucun identifiant de billet envoyé');
                }
                break;

            case ($_GET['action'] == 'viewEditPost'):
                // envoie vers la page d'édition d'un article
                if (isset($_GET['id']) && $_GET['id'] > 0) {
                    $infos = new PostController();
                    $infos->viewEditPostB($_GET['id']);
                } else {
                    throw new Exception('Aucun identifiant d\'article envoyé pour édition');
                }
                break;

            case ($_GET['action'] == 'viewEditCom'):
                // envoie vers la page d'édition d'un commentaire
                if (isset($_GET['id']) && $_GET['id'] > 0) {
                    $infos = new ComController();
                    $infos->viewEditComB($_GET['id']);
                } else {
                    throw new Exception('Aucun identifiant d\'article envoyé');
                }
                break;

            case ($_GET['action'] == 'viewEditUser'):
                // envoie vers la page d'édition d'un utilisateur
                if (isset($_GET['id']) && $_GET['id'] > 0) {
                    $infos = new UserController();
                    $infos->viewEditUserB($_GET['id']);
                } else {
                    throw new Exception('Aucun identifiant d\'utilisateur envoyé');
                }
                break;

            case ($_GET['action'] == 'deletePost'):
                // supprimer un article
                if (isset($_GET['id']) && $_GET['id'] > 0) {
                    $infos = new PostController();
                    $infos->suprPost();
                } else {
                    throw new Exception('Aucun identifiant d\'article envoyé');
                }
                break;

            case ($_GET['action'] == 'deleteCom'):
                // supprimer un commentaire
                if (isset($_GET['id']) && $_GET['id'] > 0) {
                    $infos = new ComController();
                    $infos->suprCom();
                } else {
                    throw new Exception('Aucun identifiant de commentaire envoyé');
                }
                break;

            case ($_GET['action'] == 'deleteUser'):
                // supprimer un utilisateur
                if (isset($_GET['id']) && $_GET['id'] > 0) {
                    $infos = new UserController();
                    $infos->suprUser();
                } else {
                    throw new Exception('Aucun identifiant d\'utilisateur envoyé');
                }
                break;

            case ($_GET['action'] == 'administration'):
                // envoie vers la page d'administration
                if (isset($_COOKIE["admin"])) {
                    $infos = new Controller();
                    $infos->administration();
                } else {
                    header('Location: index.php?action=connection');
                }
                break;

            case ($_GET['action'] == 'connection'):
                // envoie vers la page de connection
                $infos = new UserController();
                $infos->connectionAdmin();
                break;

            case ($_GET['action'] == 'usersA'):
                // envoie vers la page gestion des utilisateurs
                $infos = new UserController();
                $infos->allUsers();
                break;

            case ($_GET['action'] == 'logout'):
                // deconnection
                $infos = new UserController();
                $infos->connectionAdmin();
                session_start();
                session_unset();
                session_destroy();
                setcookie('admin', '', time());
                header('Location: index.php');
                break;

            case ($_GET['action'] == 'viewWritePost'):
                // envoie vers la page de rédaction d'un article
                $infos = new PostController();
                $infos->viewWritePost();
                break;

            case ($_GET['action'] == 'viewAllPost'):
                // envoie vers la page de gestion des articles
                $infos = new PostController();
                $infos->allPostBack();
                break;

            case ($_GET['action'] == 'viewAllCom'):
                // envoie vers la page de gestion des commentaires
                $infos = new ComController();
                $infos->allComBack();
                break;

            case ($_GET['action'] == 'creationUser'):
                // envoie vers la page de création de compte
                $infos = new UserController();
                $infos->createUserView();
                break;

            case ($_GET['action'] == 'about'):
                // envoie vers la page à propos
                $infos = new Controller();
                $infos->aboutAuthor();
                break;

            case ($_GET['action'] == 'signalCom'):
                // signalement d'un commentaire
                if (isset($_GET['id']) && $_GET['id'] > 0) {
                    $infos = new ComController();
                    $infos->signalComUser($_GET['id']);
                } else {
                    throw new Exception('Aucun identifiant de commentaire envoyé');
                }
                break;

            case ($url == ''):
                $infos = new PostController();
                $infos->listPosts();
                break;


        }
   /* } else {
        $infos = new Controller();
        $infos->error();
    } */

} catch (Exception $e) {
    echo 'Erreur : ' . $e->getMessage();
}
