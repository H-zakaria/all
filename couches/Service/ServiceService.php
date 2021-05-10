<?php
include_once(__DIR__ . '/../DAO/ServiceDAO.php');

class ServiceService
{
  function selectAllFromServ()
  {
    $serv = new ServiceDAO();
    return $serv->selectAllFromServ();
  }
  function selectServByNoserv($noserv)
  {
    $serv = new ServiceDAO();
    return $serv->selectServByNoserv($noserv);
  }

  function deleteServ($noserv)
  {
    $serv = new ServiceDAO();
    return $serv->deleteServ($noserv);
  }

  function createService(Service $newServ)
  {
    $servDAO = new ServiceDAO;
    $servDAO->createService($newServ);
  }
  function updateService($updatedServ)
  {
    $servDAO = new ServiceDAO;
    $servDAO->updateService($updatedServ);
  }
}
