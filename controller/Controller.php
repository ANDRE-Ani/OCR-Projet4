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
    $total = $PostManager->number($nbligne);
    $totalC = $ComManager->numberC($nbligneC);
    require('view/adminView.php');
}


}

