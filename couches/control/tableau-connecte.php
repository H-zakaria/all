<?php
include_once(__DIR__ . '/../view/header.php');
include_once(__DIR__ . '/../view/tableaux.php');

// include_once(__DIR__ . '/couches/Service/ServiceService.php');

session_start();

if (isset($_SESSION['user_id'])) {
  
  try{
  $empService = new EmployeService;
  $counter = $empService->ajoutsJour();
  $empService = new EmployeService;
  $infosEmps =  $empService->infosGeneralesEmp();
  $sups = $empService->selectAllSupsNum();
  $serv = new ServiceService();
  $services = $serv->selectAllFromServ();
  showHeader($counter);
  afficherTabEmp($infosEmps, $sups , $services);
  afficherTabServices();
  
  }catch(ServiceException $e){
    echo $e->getMessage();
  }
  
} else {
  header("Location: signup&login_form.php");
}
