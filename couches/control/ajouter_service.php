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
$servService->createService($newServ);

header("Location: tableau-connecte.php?Enregistrement=succes");
