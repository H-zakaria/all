<?php

class ProjetDAO extends CommonDAO
{

  function selectAllProjectsNum()
  {
    $db = $this->connexion();
    $stmt = $db->prepare("SELECT DISTINCT noproj FROM proj;");
    $stmt->execute();
    $rs = $stmt->get_result();
    $data = $rs->fetch_all(MYSQLI_ASSOC);
    $rs->free();
    $db->close();
    return $data;
  }
}
