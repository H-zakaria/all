<?php
class CommonDAO

{
  private $dbServername = "localhost";
  private $username = "zak";
  private $dbPassword = "mdp";
  private $dbName = "gestion_emp";

  function connexion()
  {

    mysqli_report(MYSQLI_REPORT_STRICT|MYSQLI_REPORT_ERROR);
    try{
      $conn = new mysqli($this->dbServername, $this->username, $this->dbPassword, $this->dbName);
      return $conn;
      
    }catch(Exception $e){

      throw new DAOException($e->getMessage(), $e->getCode());
      
    }
    
    
  }
}
