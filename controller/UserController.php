<?php

namespace controller;

use Exception;
use model\ComManager;
use model\PostManager;
use model\UserManager;

// Controler user

class UserController extends Controller
{

// connection à l'admin
    public function logAdmin()
    {
        if (isset($_POST["user"]) && isset($_POST["pass"])) {
            $UserManager = new UserManager();
            $result = $UserManager->admin($_POST['user'], $_POST['pass']);
            $correctPassword = password_verify($_POST['pass'], $result['pass']);
            $user = ($_POST['user']);

            if ($correctPassword != false) {
                session_start();
                $_SESSION['user'] = $_POST['user'];
                $cookie_name = "admin";
                $addr = $_SERVER['REMOTE_ADDR'];
                $nav = $_SERVER['HTTP_USER_AGENT'];
                $cookie_value = 'Utilisateur ' . $_SESSION['user'] . ' I.P. ' . $addr . ' Navigateur ' . $nav;
                setcookie($cookie_name, $cookie_value, time()+3600, "/", null, false, true);

                header('Location: index.php?action=administration');
            } else {
                echo 'Login ou mot de passe incorrect';
                echo '<br>';
                echo 'Retour sur le <a href="https://p4ocr.andre-ani.fr/">blog</a>';
            }
        } else {
            echo 'Il manque un champ';
        }
    }

    // envoie vers la page de connection pour l'admin
    public function connectionAdmin()
    {
        $PostManager = new PostManager();
        $ComManager = new ComManager();
        $UserManager = new UserManager();
        require('view/connectionView.php');
    }

    // création de compte
    public function creationUserA($user, $mail, $pass)
    {
        $UserManager = new UserManager();
        $pass_hash = password_hash($_POST['pass'], PASSWORD_DEFAULT);
        $affectedLines = $UserManager->createUser($user, $mail, $pass_hash);
        if ($affectedLines === false) {
            throw new Exception('Impossible de créer le compte');
        } else {
            header('Location: index.php?action=connection');
        }
    }

    // page de création de compte
    public function createUserView()
    {
        $PostManager = new PostManager();
        $ComManager = new ComManager();
        require('view/createUserView.php');
    }

    // affiche les utilisateurs
    public function allUsers()
    {
        $UserManager = new UserManager();
        $users = $UserManager->getUsers();
        require('view/allUserView.php');
    }

    // supprime un utilisateur
    public function suprUser()
    {
        $UserManager = new UserManager();
        $affectedLines = $UserManager->deleteUser();
        if ($affectedLines === false) {
            throw new Exception('Impossible de supprimer l\'utilisateur');
        } else {
            header('Location: index.php?action=administration');
        }
    }

    // envoie vers la page d'édition d'un utilisateur
    public function viewEditUserB($userId)
    {
        $UserManager = new UserManager();
        $userE = $UserManager->getUser($userId);
        require('view/editUserView.php');
    }

    // édition d'un utilisateur
    public function editUserBack($user, $mail, $id)
    {
        $UserManager = new UserManager();
        $affectedLines = $UserManager->editUserL($user, $mail, $id);
        if ($affectedLines === false) {
            throw new Exception('Impossible d\'éditer l\'utilisateur');
        } else {
            header('Location: index.php?action=administration');
        }
    }
}
