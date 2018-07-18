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
                $cookie_name = 'admin';
                $admin = session_id().microtime().rand(0,9999999999);
                $admin = hash('sha512', $admin);
                setcookie($cookie_name, $admin, time() + (60 * 20), "/", "p4ocr.andre-ani.fr", true, true);
                $_SESSION['admin'] = $admin;
                
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

    // création de compte
    public function creationUserB($user, $mail, $pass)
    {
        $UserManager = new UserManager();
        $pass_hash = password_hash($_POST['pass'], PASSWORD_DEFAULT);
        $affectedLines = $UserManager->createUser($user, $mail, $pass_hash);
        if ($affectedLines === false) {
            throw new Exception('Impossible de créer le compte');
        } else {
            header('Location: index.php?action=administration');
        }
    }

    // page de création de compte depuis front
    public function createUserView()
    {
        $PostManager = new PostManager();
        $ComManager = new ComManager();
        require('view/createUserView.php');
    }

    // page de création de compte depuis back
    public function createUserViewB()
    {
        $PostManager = new PostManager();
        $ComManager = new ComManager();
        require('view/createUserViewB.php');
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
