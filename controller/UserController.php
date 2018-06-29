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
    public function logAdmin() {
        if (isset($_POST["user"]) && isset($_POST["pass"])) {
            $UserManager = new UserManager();
            $result = $UserManager->admin($_POST['user'], $_POST['pass']);
            $correctPassword = password_verify($_POST['pass'], $result['pass']);
            $user = ($_POST['user']);

            if ($correctPassword != false) {
                session_start();
                $_SESSION['user'] = $user;
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
function connectionAdmin() {
    $PostManager = new PostManager();
    $ComManager = new ComManager();
    $UserManager = new UserManager();
    $total = $PostManager->number($nbligne);
    $totalC = $ComManager->numberC($nbligneC);
    require('view/connectionView.php');
}

// création de compte
function creationUserA($user, $pass) {
    $UserManager = new UserManager();
    $pass_hash = password_hash($_POST['pass'], PASSWORD_DEFAULT);
    $affectedLines = $UserManager->createUser($user, $pass_hash);
    if ($affectedLines === false) {
        throw new Exception('Impossible de créer le compte');
    }
    else {
        header('Location: index.php?action=connection');
    }
}

// page de création de compte
function createUserView() {
    $PostManager = new PostManager();
    $ComManager = new ComManager();
    $total = $PostManager->number($nbligne);
    $totalC = $ComManager->numberC($nbligneC);
    require('view/createUserView.php');
}


}