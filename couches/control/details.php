<?php

include_once(__DIR__ . '/../view/header.php');
include_once(__DIR__ . '/../view/AfficherDetails.php');
include_once(__DIR__ . '/../Service/EmployeService.php');
include_once(__DIR__ . '/../Service/ModificationService.php');

session_start();
if (!isset($_SESSION['user_id'])) {

  header("Location: signup&login_form.php");
}


$noemp = $_GET['noemp'];


$empService = new EmployeService;
try{ 
$empService = new EmployeService;
$counter = $empService->ajoutsJour();
showHeader($counter);
$emp = $empService->selectDetailInfos($noemp);
$supInfos = $empService->selectDetailInfosSup($noemp);
$modifServ = new ModificationService();
$modifs = $modifServ->selectModifHisto($noemp);
}catch (ServiceException $e){
  echo "Un probleme est survenu dans l'affichage de la page réessayez ulterieurement.";
}

show_details($emp, $supInfos, $modifs);
