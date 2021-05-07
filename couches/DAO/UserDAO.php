<?php

class UserDAO
{



    function checkUsername($username)
    {
        $db = new mysqli('localhost', 'zak', 'mdp', 'gestion_emp');
        $stmt = $db->prepare("SELECT count(nom) as nom FROM users WHERE nom = ?;");
        $stmt->bind_param('s', $username);
        $stmt->execute();
        $rs = $stmt->get_result();
        $data = $rs->fetch_all(MYSQLI_ASSOC); //transformer le tableau en objet, et return
        $rs->free();
        $db->close();
        return $data; //modifier pour utiliser EXISTS dans la query
    }
    function createUser($username, $password) //reçoit objt
    {

        $hash_mdp = password_hash($password, PASSWORD_DEFAULT); //dans service;
        $db = new mysqli('localhost', 'zak', 'mdp', 'gestion_emp');
        $stmt = $db->prepare("INSERT INTO users (nom, mdp) VALUES (?, ?);");
        $stmt->bind_param('ss', $username, $hash_mdp);
        $stmt->execute();
        $rs = $stmt->get_result();
        $db->close();
        return $rs;
    }


    function selectUserInfo($username)
    {
        $db = new mysqli('localhost', 'zak', 'mdp', 'gestion_emp');
        $stmt = $db->prepare("SELECT * FROM users WHERE nom= ?;");
        $stmt->bind_param('s', $username);
        $stmt->execute();
        $rs = $stmt->get_result();
        $data = $rs->fetch_all(MYSQLI_ASSOC);
        $rs->free();
        $db->close();
        return $data;
    }
}
