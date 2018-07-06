<?php

namespace controller;

use model\ComManager;
use model\PostManager;
use model\UserManager;

// Controler

class Controller
{

// page � propos
    public function aboutAuthor()
    {
        require 'view/aboutView.php';
    }

// envoie vers la page d'administration
    public function administration()
    {
        $PostManager = new PostManager();
        $ComManager = new ComManager();
        $UserManager = new UserManager();
        $loginUser = $UserManager->login($nbLigne);
        $total = $PostManager->number($nbligne);
        $totalC = $ComManager->numberC($nbligneC);

        require 'view/adminView.php';
    }

// page d'erreur
    public function errorView()
    {
        // $UserManager = new UserManager();
        require 'view/errorView.php';
    }

}
