<?php

namespace controller;

use model\ComManager;
use model\PostManager;
use model\UserManager;

// Controler principal

class Controller
{

// page à propos
    public function aboutAuthor()
    {
        require 'view/aboutView.php';
    }

// page mentions legales
public function legalView()
{
    require 'view/legalView.php';
}

    // page d'erreur
    public function error404()
    {
        require '../view/errorView.php';
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


}
