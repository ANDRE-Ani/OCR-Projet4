<?php

namespace model;

use model\Manager;
use PDO;

class UserManager extends Manager

{
// vérifie le login
public function admin($user, $pass) {
    $bdd = $this->dbConnect();
    $users = $bdd->prepare('SELECT * FROM adminU WHERE user = :user AND pass = :pass');
    $users->bindParam(':user', $user);
    $users->bindParam(':pass', $pass);
	$users->execute();
    $result = $users->fetch();
    $hash = $result[0];
    return $result;
}

// crée l'utilisateur
public function createUser($user, $pass_hash) {
    $bdd = $this->dbConnect();
    $login = $bdd->prepare('INSERT INTO adminU(user, pass) VALUES(?, ?)');
    $affectedLines = $login->execute(array($user, $pass_hash));
    return $affectedLines;
}

}