<?php
include_once(__DIR__ . '/header.php');
include_once(__DIR__ . '/couches/view/AjoutServForms.php')
?>

<?php

if (!isset($_SESSION['user_id'])) {

    header("Location: signup&login_form.php");
}


if ($_GET['but'] == 'ajouter') {

    afficherFormAjoutService();
?>

<?php
} else if ($_GET["but"] == 'modifier') {

    $noserv = $_GET['noserv'];

    // $datas = selectThisServ($conn, $_GET["noserv"]);
    $serv = new ServiceService();
    $service = $serv->selectServByNoserv($noserv);



?>

<?php
    afficherFormModifierService($service);
} else {
    echo "l'employé n'existe pas.";
}
?>

