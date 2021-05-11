<?php
include_once(__DIR__ . '/CommonDAO.php');
class UserDAO extends CommonDAO
{



  function checkUsername($username)
  {
    mysqli_report(MYSQLI_REPORT_STRICT|MYSQLI_REPORT_ERROR);
    try{
    $db = $this->connexion();
    $stmt = $db->prepare("SELECT count(nom) as nom FROM users WHERE nom = ?;");
    $stmt->bind_param('s', $username);
    $stmt->execute();
    $rs = $stmt->get_result();
    $data = $rs->fetch_all(MYSQLI_ASSOC); //transformer le tableau en objet, et return
    $rs->free();
    $db->close();
    }catch(Exception $e){

    throw new DAOException($e->getMessage(), $e->getCode());
    
    }
    return $data; //modifier pour utiliser EXISTS dans la query
  }
  function createUser($username, $password) //reçoit objt
  {
    mysqli_report(MYSQLI_REPORT_STRICT|MYSQLI_REPORT_ERROR);
    try{
    $hash_mdp = password_hash($password, PASSWORD_DEFAULT); //dans service;
    $db = $this->connexion();
    $stmt = $db->prepare("INSERT INTO users (nom, mdp) VALUES (?, ?);");
    $stmt->bind_param('ss', $username, $hash_mdp);
    $stmt->execute();
    $rs = $stmt->get_result();
    $db->close();
    }catch(Exception $e){

    throw new DAOException($e->getMessage(), $e->getCode());
    
    }
    return $rs;
  }


  function selectUserInfo($username)
  {
    mysqli_report(MYSQLI_REPORT_STRICT|MYSQLI_REPORT_ERROR);
    try{
    $db = $this->connexion();
    $stmt = $db->prepare("SELECT * FROM users WHERE nom= ?;");
    $stmt->bind_param('s', $username);
    $stmt->execute();
    $rs = $stmt->get_result();
    $data = $rs->fetch_all(MYSQLI_ASSOC);
    $rs->free();
    $db->close();
    }catch(Exception $e){

    throw new DAOException($e->getMessage(), $e->getCode());
    
    }
    return $data;
  }
}
