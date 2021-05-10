<?php

include_once(__DIR__ . '/../view/header.php');
include_once(__DIR__ . '/../Service/EmployeService.php');
include_once(__DIR__ . '/../view/modifEmp.php');
session_start();
if (!isset($_SESSION['user_id'])) {

  header("Location: signup&login_form.php");
}
showHeader();
$noemp = $_GET['noemp'];
$empService = new EmployeService;
$emp =  $empService->selectAllOfOneEmpByNoemp($noemp);
afficherFormModifEmp($emp);
