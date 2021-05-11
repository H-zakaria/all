<?php
include_once(__DIR__ . '/../Service/EmployeService.php');
session_start();
if (!isset($_SESSION)) {

  header("Location: signup&login_form.php");
}


$empService = new EmployeService;
try{
  $sups = $empService->selectAllSupsNum();

}catch(ServiceException $e){

}
$sups_1d = [];
foreach ($sups as $sup) {
  $sups_1d[] = $sup['noemp'];
}
if (!in_array($_GET['noemp'], $sups_1d)) {
  $noemp = $_GET['noemp'];
  try{

    $deleted = $empService->deleteEmp($noemp);
  }catch(ServiceException $e){

  }



  header("Location: tableau-connecte.php?suppression=succes");
  // echo 'here';

} else {
  echo "impossible de supprimer un supérieur";
}


?>
</body>

</html>