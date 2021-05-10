<?php
include_once(__DIR__ . '/../view/header.php');
include_once(__DIR__ . '/../view/tableaux.php');

// include_once(__DIR__ . '/couches/Service/ServiceService.php');

session_start();

if (isset($_SESSION['user_id'])) {
  showHeader();
  afficherTabEmp();
  afficherTabServices();
} else {
  header("Location: signup&login_form.php");
}
