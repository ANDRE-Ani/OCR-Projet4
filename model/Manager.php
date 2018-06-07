<?php

class Manager

{
    protected function dbConnect() {
        $bdd = new \PDO('mysql:host=localhost;dbname=boutique_ecrivain;charset=utf8', 'boutique_bdd', 'cybergoth1978');
        return $bdd;
    }
}
