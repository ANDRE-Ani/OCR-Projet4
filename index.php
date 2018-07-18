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
    // page d'accueil avec tous les articles
    if (isset($_GET['action'])) {
        if ($_GET['action'] == 'listPosts') {
            $infos = new PostController();
            $infos->listPosts();
            

            // affiche un article et ses commentaires
        } elseif ($_GET['action'] == 'post') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                $infos = new PostController();
                $infos->post();
            } else {
                throw new Exception('Aucun identifiant de billet envoyé');
            }

            // écrire un article
        } elseif ($_GET['action'] == 'writePostA') {
            if (!empty($_POST['titre']) && !empty($_POST['auteur']) && !empty($_POST['contenu'])) {
                $infos = new PostController();
                $infos->writePost($_POST['titre'], $_POST['auteur'], $_POST['contenu']);
            } else {
                throw new Exception('Tous les champs ne sont pas remplis');
            }
        }

        // édite un article
        elseif ($_GET['action'] == 'editPost') {
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
        }

        // édition d'un commentaire
        elseif ($_GET['action'] == 'editComBack') {
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
        }

        // édition d'un utilisateur
        elseif ($_GET['action'] == 'editUserL') {
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
        }

        // écrire un commentaire
        elseif ($_GET['action'] == 'writeComA') {
            $author =htmlspecialchars($_POST['author']);
            $comment =htmlspecialchars($_POST['comment']);  
            if (!empty($_POST['author']) && !empty($_POST['comment'])) {
                $infos = new ComController();
                $infos->writeComFront($_POST['author'], $_POST['comment'], $_GET['post_id']);
            } else {
                throw new Exception('Tous les champs ne sont pas remplis');
            }
        }

        // connection à l'admin
        elseif ($_GET['action'] == 'logAdminF') {
            if ((isset($_POST['user']) && !empty($_POST['user'])) && (isset($_POST['pass']) && !empty($_POST['pass']))) {
                $infos = new UserController();
                $infos->logAdmin();
            } else {
                throw new Exception('Tous les champs ne sont pas remplis');
            }
        }

        // création de compte
        elseif ($_GET['action'] == 'createUser') {
            if (!empty($_POST['user']) && !empty($_POST['mail']) && !empty($_POST['pass']) && !empty($_POST['pass2']) && ($_POST['pass']) == ($_POST['pass2'])) {
                $infos = new UserController();
                $infos->creationUserA($_POST['user'], $_POST['mail'], $_POST['pass']);
            } else {
                throw new Exception('Tous les champs ne sont pas remplis ou les mots de passe ne correspondent pas');
            }
        }

        // création de compte depuis back
        elseif ($_GET['action'] == 'createUserB') {
            if (!empty($_POST['user']) && !empty($_POST['mail']) && !empty($_POST['pass']) && !empty($_POST['pass2']) && ($_POST['pass']) == ($_POST['pass2'])) {
                $infos = new UserController();
                $infos->creationUserB($_POST['user'], $_POST['mail'], $_POST['pass']);
            } else {
                throw new Exception('Tous les champs ne sont pas remplis ou les mots de passe ne correspondent pas');
            }
        }

        // envoie vers la page de rédaction d'un commentaire
        elseif ($_GET['action'] == 'viewWriteCom') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                $infos = new ComController();
                $infos->viewWriteComBack($_GET['id']);
            } else {
                throw new Exception('Aucun identifiant de billet envoyé');
            }
        }

        // envoie vers la page d'édition d'un article
        elseif ($_GET['action'] == 'viewEditPost') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                $infos = new PostController();
                $infos->viewEditPostB($_GET['id']);
            } else {
                throw new Exception('Aucun identifiant d\'article envoyé pour édition');
            }
        }

        // envoie vers la page d'édition d'un commentaire
        elseif ($_GET['action'] == 'viewEditCom') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                $infos = new ComController();
                $infos->viewEditComB($_GET['id']);
            } else {
                throw new Exception('Aucun identifiant d\'article envoyé');
            }
        }

        // envoie vers la page d'édition d'un utilisateur
        elseif ($_GET['action'] == 'viewEditUser') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                $infos = new UserController();
                $infos->viewEditUserB($_GET['id']);
            } else {
                throw new Exception('Aucun identifiant d\'utilisateur envoyé');
            }
        }

        // supprimer un article
        elseif ($_GET['action'] == 'deletePost') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                $infos = new PostController();
                $infos->suprPost($postId);
            } else {
                throw new Exception('Aucun identifiant d\'article envoyé');
            }
        }

        // supprimer un commentaire
        elseif ($_GET['action'] == 'deleteCom') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                $infos = new ComController();
                $infos->suprCom($postId);
            } else {
                throw new Exception('Aucun identifiant de commentaire envoyé');
            }
        }

        // supprimer un utilisateur
        elseif ($_GET['action'] == 'deleteUser') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                $infos = new UserController();
                $infos->suprUser();
            } else {
                throw new Exception('Aucun identifiant d\'utilisateur envoyé');
            }
        }

        // envoie vers la page d'administration
        elseif ($_GET['action'] == 'administration') {
            if (isset($_COOKIE['admin'])) {
                $infos = new Controller();
                $infos->administration();
            } else {
                header('Location: index.php?action=connection');
            }
        }

        // envoie vers la page d'erreur
        elseif ($_GET['action'] == 'error') {
                $infos = new Controller();
                header('Location: index.php?action=error404');
        }

        // envoie vers la page de connection
        elseif ($_GET['action'] == 'connection') {
            $infos = new UserController();
            $infos->connectionAdmin();
        }

        // envoie vers la page d'accueil
        elseif ($_GET['action'] == '') {
            $infos = new UserController();
            $infos->listPosts();
        }

        // envoie vers la page d'accueil
        elseif ($_GET['action'] == '/') {
            $infos = new UserController();
            $infos->listPosts();
        } 

        // envoie vers la page gestion des utilisateurs
        elseif ($_GET['action'] == 'usersA') {
            $infos = new UserController();
            $infos->allUsers();
        }

        // deconnection
        elseif ($_GET['action'] == 'logout') {
            // $infos = new UserController();
            
            $cookie_name = "admin";
            // setcookie($cookie_name, '', time() - 3600, "/", "p4ocr.andre-ani.fr", true, true);
            // setcookie($cookie_name, '', time()-1, "/", "p4ocr.andre-ani.fr", true, true);

            $_SESSION = array();
            session_start();
            session_unset();
            session_destroy();
            setcookie('admin');
            unset($_SESSION['admin']);
            // unset($_COOKIE["admin"]);

            $infos = new PostController();
            $infos->listPosts();
            
            // header('Location: index.php');
        }

        // envoie vers la page de rédaction d'un article
        elseif ($_GET['action'] == 'viewWritePost') {
            $infos = new PostController();
            $infos->viewWritePost();
        }

        // envoie vers la page de gestion des articles
        elseif ($_GET['action'] == 'viewAllPost') {
            $infos = new PostController();
            $infos->allPostBack();
        }

        // envoie vers la page de gestion des commentaires
        elseif ($_GET['action'] == 'viewAllCom') {
            $infos = new ComController();
            $infos->allComBack();
        }

        // envoie vers la page de création de compte depuis front
        elseif ($_GET['action'] == 'creationUser') {
            $infos = new UserController();
            $infos->createUserView();
        }

        // envoie vers la page de création de compte depuis back
        elseif ($_GET['action'] == 'creationUserB') {
            $infos = new UserController();
            $infos->createUserViewB();
        }

        // envoie vers la page à propos
        elseif ($_GET['action'] == 'about') {
            $infos = new Controller();
            $infos->aboutAuthor();
        }

        // envoie vers la page mentios légales
        elseif ($_GET['action'] == 'legal') {
            $infos = new Controller();
            $infos->legalView();
        }

        // signalement d'un commentaire
        elseif ($_GET['action'] == 'signalCom') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                $infos = new ComController();
                $infos->signalComUser($_GET['id']);
            } else {
                throw new Exception('Aucun identifiant de commentaire envoyé');
            }
        }

    // page d'accueil
    } else {
        $infos = new PostController();
        $infos->listPosts();        
    }

} catch (Exception $e) {
    echo 'Erreur : ' . $e->getMessage();
}

