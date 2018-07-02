<?php

namespace controller;

use Exception;
use model\ComManager;
use model\PostManager;
use model\UserManager;

// Controler

class Controller {

// page à propos
function aboutAuthor() {
    require('view/aboutView.php');
}

// envoie vers la page d'administration
function administration() {
    $PostManager = new PostManager();
    $ComManager = new ComManager();
    $UserManager = new UserManager();
    $login = $UserManager->getUsers($users);
    $total = $PostManager->number($nbligne);
    $totalC = $ComManager->numberC($nbligneC);

    //var_dump($users['user']);
    //die();
    require('view/adminView.php');
}


}

