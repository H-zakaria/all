<?php

include_once(__DIR__ . '/../view/header.php');
include_once(__DIR__ . '/../Service/EmployeService.php');
include_once(__DIR__ . '/../view/modifEmp.php');
session_start();

if (!isset($_SESSION['user_id'])) {

  header("Location: signup&login_form.php");
}
$noemp = $_GET['noemp'];
$empService = new EmployeService;
try{
$empService = new EmployeService;
$counter = $empService->ajoutsJour();
showHeader($counter);
  $emp =  $empService->selectAllOfOneEmpByNoemp($noemp);
}catch(ServiceException $e){
  echo $e->getMessage();
}
afficherFormModifEmp($emp);



if (isset($_POST['noemp'])) {

  $noemp = $_POST['noemp'];
  $empService = new EmployeService;
  try{
$previous = $empService->selectAllOfOneEmpInArray($noemp);
  }catch(ServiceException $e){

  }
  

  $query = [];
  $modif = array_diff($_POST, $previous);
  foreach ($modif as $k => $v) {
    $query[] = $k . ": " . $previous[$k] . " => " . $v;
  }


  $nom = $_POST['nom'];
  $prenom = $_POST['prenom'];
  $emploi = $_POST['emploi'];
  $sup = $_POST['sup'];
  $embauche = $_POST['embauche'];
  $sal = $_POST['sal'];
  $comm = $_POST['comm'];
  $noserv = $_POST['noserv'];
  $noproj = $_POST['noproj'];
    try{
  $updated = $empService->updateEmp($noemp, $nom, $prenom,  $emploi, $sup, $embauche, $sal, $comm, $noserv, $noproj);
    }catch(ServiceException $e){

    }
  $modifService = new ModificationService;
  foreach ($query as $modification) {
    try{
$modifService->recordModif($noemp, $modification);
    }catch(ServiceException $e){
  
    }
    
  }
  // Modification=succes?

  header("Location: tableau-connecte.php");
}
?>
</body>

</html>