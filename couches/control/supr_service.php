<?php
include_once(__DIR__ . '/../Service/ServiceService.php');
session_start();
if (!isset($_SESSION)) {

  header("Location: signup&login_form.php");
}


$noserv = $_GET['noserv'];
$servService = new ServiceService;
$deleted = $servService->deleteServ($noserv);

header("Location: tableau-connecte.php?suppression=succes");
