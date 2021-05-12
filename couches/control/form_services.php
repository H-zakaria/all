<?php
include_once(__DIR__ . '/../view/header.php');
include_once(__DIR__ . '/../view/AjoutServForms.php');
include_once(__DIR__ . '/../Service/ServiceService.php');
include_once(__DIR__ . '/../exceptions/ServiceException.php');

session_start();

if (!isset($_SESSION['user_id'])) {

  header("Location: signup&login_form.php");
}


if ($_GET['but'] == 'ajouter') {
  afficherFormAjoutService();
} else if ($_GET["but"] == 'modifier') {

  $noserv = $_GET['noserv'];

  $serv = new ServiceService();
  try {
    $empService = new EmployeService;
    $counter = $empService->ajoutsJour();
    showHeader($counter['count']);
    $service = $serv->selectServByNoserv($noserv);
  } catch (ServiceException $e) {
    $code = $e->getCode();
    echo $e->getMessage();
  }


  afficherFormModifierService($service);
} else {
  echo "l'employé n'existe pas.";
}
