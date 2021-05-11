<?php
include_once(__DIR__ . '/../DAO/ProjetDAO.php');

class ProjetService
{

  function selectAllProjectsNum()
  {
    $proj = new ProjetDAO;
    try{

    return $proj->selectAllProjectsNum();
  }catch(DAOException $e){
    throw new ServiceException($e->getMessage(), $e->getCode());
    }
    
  }
  function selectAllProjects(): array
  {
    $projDAO = new ProjetDAO;
    try{
      
    return $projDAO->selectAllProjects();

    }catch(DAOException $e){

    throw new ServiceException($e->getMessage(), $e->getCode());
    }
  }
}
