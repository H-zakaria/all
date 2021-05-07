<?php
include_once(__DIR__ . '/header.php');

if (!isset($_SESSION['user_id'])) {

    header("Location: signup&login_form.php");
}


$noserv = $_GET['noserv'];
$servService = new ServiceService;
$deleted = $servService->deleteServ($noserv);
if (!$deleted) {
    echo "erreur: le service n'a pas été éffacé de la bdd";
} else {
    header("Location: tableau-connecte.php?suppression=succes");
}
