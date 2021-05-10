<?php
class CommonDAO

{
  private $dbServername = "localhost";
  private $username = "zak";
  private $dbPassword = "mdp";
  private $dbName = "gestion_emp";

  function connexion()
  {
    $conn = new mysqli($this->dbServername, $this->username, $this->dbPassword, $this->dbName);
    return $conn;
  }
}
