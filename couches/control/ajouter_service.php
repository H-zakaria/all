<?php
include_once(__DIR__ . '/../view/header.php');
include_once(__DIR__ . '/../Service/ServiceService.php');
session_start();
if (!isset($_SESSION['user_id'])) {

  header("Location: signup&login_form.php");
}

$newServ = new Service;
$newServ->setNoserv($_POST["noserv"])->setService($_POST["service"])->setVille($_POST["ville"]);

$servService = new ServiceService;
try{
$servService->createService($newServ);
}catch(ServiceException $e){
  echo 'Un probleme est survenu lors de la création du service.';
  echo $e->getMessage();
}
header("Location: tableau-connecte.php?Enregistrement=succes");
