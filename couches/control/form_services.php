<?php
include_once(__DIR__ . '/../view/header.php');
include_once(__DIR__ . '/../view/AjoutServForms.php');
include_once(__DIR__ . '/../Service/ServiceService.php');
session_start();

if (!isset($_SESSION['user_id'])) {

  header("Location: signup&login_form.php");
}
showHeader();

if ($_GET['but'] == 'ajouter') {

  afficherFormAjoutService();
} else if ($_GET["but"] == 'modifier') {

  $noserv = $_GET['noserv'];

  // $datas = selectThisServ($conn, $_GET["noserv"]);
  $serv = new ServiceService();
  try{
    $service = $serv->selectServByNoserv($noserv);
  }catch(ServiceException $e){
    $code = $e->getCode();
    echo $e->getMessage();
    // if ($code == 1515{
    //   echo "blah";
    // }
  }


  afficherFormModifierService($service);
} else {
  echo "l'employé n'existe pas.";
}
