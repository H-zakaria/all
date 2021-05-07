<?php

include_once(__DIR__ . '/header.php');

if (!isset($_SESSION['user_id'])) {

    header("Location: signup&login_form.php");
}

$noemp = $_GET['noemp'];
$sql = "SELECT * FROM emp WHERE noemp = $noemp;";
// $datas = selectThisEmp($conn, $_GET["noemp"]);
$empService = new EmployeService;

$emp =  $empService->selectAllOfOneEmpByNoemp($noemp);

afficherFormModifEmp();
