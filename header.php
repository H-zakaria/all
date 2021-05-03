<?php
include_once 'includes/connexion_db.php';
include_once 'includes/fonctions.php';

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

            $counter = ajoutsJour();


        ?>
            <p class="username"><?php echo $_SESSION['nom'] ?></p>
            <p id="counter">Ajouts du jour: <span><?php echo " " . $counter[0]['count'] ?></span></p>


            <ul>
                <li><a href='form.php?'>ajouter un employé</a></li>
                <li><a href='form_services.php?but=ajouter' id="mid">ajouter un service</a></li>
                <li><a href='./includes/logout.php'>deconnexion</a></li>

            </ul>
        <?php } ?>
    </nav>