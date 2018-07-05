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

// Récupère un utilisateur
public function getUser($idUser) {
    $db = $this->dbConnect();
    $req = $db->prepare('SELECT id, user, mail FROM adminU WHERE id = ?');
    $req->execute(array($idUser));
    $userE = $req->fetch();
    return $userE;
}

// Supprime un utilisateur
public function deleteUser() {
    $bdd = $this->dbConnect();
    $userD = $bdd->prepare("DELETE FROM adminU WHERE id=".$_GET['id']);
    $affectedLines = $userD->execute(array($userId));
    return $affectedLines;
}

// comptage des utilisateurs
public function login() {
    $db = $this->dbConnect();
    $req = $db->query('SELECT COUNT(id) as countid FROM adminU'); 
    $req->execute(array());
    $nbLogin = $req->fetch();
    return $nbLogin;
}

// Edite un utilisateur
public function editUserL($user, $mail, $id) {
    $db = $this->dbConnect();
    $req = $db->prepare('UPDATE adminU SET user = ?, mail = ? WHERE id = ?');
    $userLog = $req->execute(array($user, $mail, $id));
    /* var_dump($login);
    var_dump($id);
    var_dump($mail);
    die(); */
    return $userLog;
}

}