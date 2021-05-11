<?php
include_once(__DIR__ . '/../DAO/ServiceDAO.php');

class ServiceService
{
  function selectAllFromServ()
  {
    $serv = new ServiceDAO();
    try{
    return $serv->selectAllFromServ();
  }catch(DAOException $e){
    throw new ServiceException($e->getMessage(), $e->getCode());
    }
  }
  function selectServByNoserv($noserv)
  {
    $serv = new ServiceDAO();
    try{
    return $serv->selectServByNoserv($noserv);
  }catch(DAOException $e){
    throw new ServiceException($e->getMessage(), $e->getCode());
    }
  }

  function deleteServ($noserv)
  {
    $serv = new ServiceDAO();
    try{
    return $serv->deleteServ($noserv);
  }catch(DAOException $e){
    throw new ServiceException($e->getMessage(), $e->getCode());
    }
  }

  function createService(Service $newServ)
  {
    $servDAO = new ServiceDAO;
    try{
    $servDAO->createService($newServ);
  }catch(DAOException $e){
    throw new ServiceException($e->getMessage(), $e->getCode());
    }
  }
  function updateService($updatedServ)
  {
    $servDAO = new ServiceDAO;
    try{
    $servDAO->updateService($updatedServ);
  }catch(DAOException $e){
    throw new ServiceException($e->getMessage(), $e->getCode());
    }
  }
}
