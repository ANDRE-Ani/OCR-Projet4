<?php

namespace model;

include 'config.php';

class Manager
{
    protected function dbConnect()
    {
        try {
            // $bdd = new \PDO('mysql:host=localhost;dbname=boutique_ecrivain;charset=utf8', 'boutique_bdd', 'cybergoth1978');
            $bdd = new \PDO('mysql:host='.DB_HOST.';dbname='.DB_NAME, DB_USER, DB_PASS);
            return $bdd;
        } catch (PDOException $e) {
            echo 'La connexion a échoué.<br />';
            echo 'Informations : [', $e->getCode(), '] ', $e->getMessage();
        }
    }
}
