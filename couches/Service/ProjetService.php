<?php
include_once(__DIR__ . '/../DAO/ProjetDAO.php');

class ProjetService
{

  function selectAllProjectsNum()
  {
    $proj = new ProjetDAO;
    return $proj->selectAllProjectsNum();
  }
  function selectAllProjects(): array
  {
    $projDAO = new ProjetDAO;
    return $projDAO->selectAllProjects();
  }
}
