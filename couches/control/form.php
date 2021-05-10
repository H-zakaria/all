<?php

include_once(__DIR__ . '/../view/header.php');
include_once(__DIR__ . '/../Service/EmployeService.php');
include_once(__DIR__ . '/../Service/ProjetService.php');
include_once(__DIR__ . '/../Model/Employe2.php');
include_once(__DIR__ . '/../view/form_ajout_emp.php');

session_start();

if (!isset($_SESSION)) {
  header("Location: signup&login_form.php");
}
showHeader();
$empService = new EmployeService;
$superieurs = $empService->selectInfosSups();
$projService = new ProjetService;
$projets = $projService->selectAllProjects();
afficherFormAjout($superieurs, $projets);
