<?php

namespace model;

class Manager
{
    protected function dbConnect()
    {
        try {
            $bdd = new \PDO('mysql:host=localhost;dbname=boutique_ecrivain;charset=utf8', 'boutique_bdd', 'cybergoth1978');
            return $bdd;
        } catch (PDOException $e) {
            echo 'La connexion a échoué.<br />';
            echo 'Informations : [', $e->getCode(), '] ', $e->getMessage();
        }
    }
}
