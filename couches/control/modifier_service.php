<?php
include_once(__DIR__ . '/../Service/ServiceService.php');
include_once(__DIR__ . '/../Model/Service.php');
session_start();

if (!isset($_SESSION['user_id'])) {

  header("Location: signup&login_form.php");
}


if (isset($_POST['noserv'])) {
  $noserv = $_POST['noserv'];
  $service = $_POST['service'];
  $ville = $_POST['ville'];
  $updatedServ = new Service;
  $updatedServ->setNoserv($noserv)->setService($service)->setVille($ville);
  $servServ = new ServiceService;
  try{
    
    $servServ->updateService($updatedServ);
  }catch(ServiceException $e){

  }
  header("Location: tableau-connecte.php?Modification=succes");
}
