<?php

namespace model;

use model\Manager;
use PDO;

class UserManager extends Manager

{
// vérifie le login
public function admin($user) {
    $bdd = $this->dbConnect();
    $users = $bdd->prepare('SELECT * FROM adminU WHERE user = :user');
    $users->bindParam(':user', $user);
	$users->execute();
    $result = $users->fetch();
    $hash = $result[0];
    return $result;
}

// crée l'utilisateur
public function createUser($user, $mail, $pass_hash) {
    $bdd = $this->dbConnect();
    $login = $bdd->prepare('INSERT INTO adminU(user, mail, pass) VALUES(?, ?, ?)');
    $affectedLines = $login->execute(array($user, $mail, $pass_hash));
    return $affectedLines;
}

// Récupère les utilisateurs
public function getUsers() {
    $db = $this->dbConnect();
    $req = $db->query('SELECT id, user, mail, DATE_FORMAT(dayTime, "%d/%m/%Y à %Hh%imin") AS dayTime FROM adminU ORDER BY dayTime DESC');  
    return $req;
}

}