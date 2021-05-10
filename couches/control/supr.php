<?php
include_once(__DIR__ . '/../Service/EmployeService.php');
session_start();
if (!isset($_SESSION)) {

  header("Location: signup&login_form.php");
}


$empService = new EmployeService;
$sups = $empService->selectAllSupsNum();
$sups_1d = [];
foreach ($sups as $sup) {
  $sups_1d[] = $sup['noemp'];
}
if (!in_array($_GET['noemp'], $sups_1d)) {
  $noemp = $_GET['noemp'];
  $deleted = $empService->deleteEmp($noemp);



  header("Location: tableau-connecte.php?suppression=succes");
  // echo 'here';

} else {
  echo "impossible de supprimer un supérieur";
}


?>
</body>

</html>