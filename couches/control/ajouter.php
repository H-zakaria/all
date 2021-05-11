<?php

// include_once(__DIR__ . '/couches/Model/Employe.php');
include_once(__DIR__ . '/../view/header.php');
include_once(__DIR__ . '/../Service/EmployeService.php');
include_once(__DIR__ . '/../Service/ProjetService.php');

session_start();
if (!isset($_SESSION['user_id'])) {

  header("Location: signup&login_form.php");
}


$proj = new ProjetService();
try{
  $num_projets = $proj->selectAllProjectsNum();
}catch(ServiceException $e){
  echo $e->getMessage();
}



$msg = [];
// print_r($num_projets);
$num_projets_1d = [];
foreach ($num_projets as $n) {
  $num_projets_1d[] = $n['noproj'];
}
// print_r($num_projets_1d);


if (isset($_POST)) {

  $incomplet = false;
  if (empty($_POST['nom'])) {
    $msg[] = " Vous n'avez pas entré le nom ";
    $incomplet = true;
  }
  if (empty($_POST['prenom'])) {
    $msg[] = "Vous n'avez pas entré le prenom ";
    $incomplet = true;
  }
  if (empty($_POST['emploi'])) {
    $msg[] = "Vous n'avez pas entré l'emploi de l'employé";
    $incomplet = true;
  }
  if (empty($_POST['sup'])) {
    $msg[] = "Vous n'avez pas selectionné le supérieur de l'employé";
    $incomplet = true;
  }
  if (empty($_POST['embauche'])) {
    $msg[] = "Vous n'avez pas entré la date d'embauche ";
    $incomplet = true;
  }
  if (empty($_POST['sal'])) {
    $msg[] = " Vous n'avez pas entré le montant du salaire ";
    $incomplet = true;
  }
  if (empty($_POST['noserv'])) {
    $msg[] = "Vous n'avez pas entré le numero de service ";
    $incomplet = true;
  }
  if (empty($_POST['noproj'])) {
    $msg[] = "Vous n'avez pas entré le numero de projet ";
    $incomplet = true;
  } elseif (!in_array($_POST['noproj'], $num_projets_1d)) {
    $msg[] = "Ce projet n'existe pas";
    $incomplet = true;
  }
  if ($incomplet) {
    include_once('form.php');
    foreach ($msg as $m) {
      echo $m . "<br>";
    }
  } else {


    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $emploi = $_POST['emploi'];
    $sup = $_POST['sup'];
    $embauche = $_POST['embauche'];
    $sal = $_POST['sal'];
    $comm = $_POST['comm'];
    $noserv = $_POST['noserv'];
    $noproj = $_POST['noproj'];

    // 
    print_r($_POST);
    $empService = new EmployeService();
    $problem = false;
    try{
      $empService->createEmp($nom, $prenom, $emploi, $sup, $embauche, $sal, $comm, $noserv, $noproj);
    }catch(ServiceException $e){
      echo "Un probleme est survennu lors de la creation de l'employé réessayez ulterieurement";
      echo $e->getMessage();
      //faire en sorte que le header ne se lance pas? -> faire collapse les pages pour que les données du form soient conservée et que l'affichage du message soit sur la bonne page
      $problem = true;//et enlever ça
    }
    if($problem==false){
      header("Location: tableau-connecte.php?Enregistrement=succes");
    }

    
  }
} else {
  echo 'post passe pas';
}
