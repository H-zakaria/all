<?php
include_once 'connexion_db.php';
include_once 'fonctions.php';
include_once(__DIR__ . '/couches/Service/EmployeService.php');
include_once(__DIR__ . '/couches/Service/ModificationService.php');;
include_once(__DIR__ . '/couches/Service/ProjetService.php');
include_once(__DIR__ . '/couches/Service/ServiceService.php');
include_once(__DIR__ . '/couches/Service/UserService.php');



session_start();
// checkSession();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css" type="text/css">
    <title>Document</title>
</head>

<body>
    <nav class="nav">
        <?php if (isset($_SESSION['user_id'])) {
            $empService = new EmployeService;
            $counter = $empService->ajoutsJour();
            // print_r($counter);
        ?>

            <p class="username"><?php echo $_SESSION['nom'] ?></p>
            <p id="counter">Ajouts du jour: <span><?php echo " " . $counter['count'] ?></span></p>
            <p><a href="tableau-connecte.php" style="list-style: none; margin-left: 50px;text-decoration:none; color: #fff;">Tableau</a></p>


            <ul>
                <li><a href='form.php?'>ajouter un employé</a></li>
                <li><a href='form_services.php?but=ajouter' id="mid">ajouter un service</a></li>
                <li><a href='logout.php'>deconnexion</a></li>

            </ul>
        <?php } ?>
    </nav>