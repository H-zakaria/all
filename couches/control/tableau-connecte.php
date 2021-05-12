<?php
include_once(__DIR__ . '/../view/header.php');
include_once(__DIR__ . '/../view/show_tables.php');
include_once(__DIR__ . '/../Service/EmployeService.php');
include_once(__DIR__ . '/../exceptions/ServiceException.php');
include_once(__DIR__ . '/../Service/ServiceService.php');


// include_once(__DIR__ . '/couches/Service/ServiceService.php');

session_start();

if (isset($_SESSION['user_id'])) {

  try {
    $empService = new EmployeService;
    $counter = $empService->ajoutsJour();
    $empService = new EmployeService;
    $infosEmps =  $empService->infosGeneralesEmp();
    $sups = $empService->selectAllSupsNum();
    $serv = new ServiceService();
    $services = $serv->selectAllFromServ();
    showHeader($counter['count']);
    show_emp_table($infosEmps,  $sups);
    show_serv_table($services);
  } catch (ServiceException $e) {
    echo $e->getMessage();
  }
} else {
  header("Location: form_login.php");
}
