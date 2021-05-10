<?php
include_once(__DIR__ . '/../Model/Projet.php');
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
  function selectAllProjects()
  {
    $db = $this->connexion();
    $stmt = $db->prepare("SELECT * FROM proj;");
    $stmt->execute();
    $rs = $stmt->get_result();
    $data = $rs->fetch_all(MYSQLI_ASSOC);
    $projets = [];
    foreach ($data as $projet) {
      $proj = new Projet;
      $proj->setNoproj($projet['noproj']);
      $proj->setNomproj($projet['nomproj']);
      $proj->setBudget($projet['budget']);
      array_push($projets, $proj);
    }
    $rs->free();
    $db->close();
    return $projets;
  }
}
