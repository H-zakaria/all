<?php
include_once(__DIR__ . '/header.php');
include_once(__DIR__ . '/couches/view/tableaux.php');

// include_once(__DIR__ . '/couches/Service/ServiceService.php');



if (isset($_SESSION['user_id'])) {

    afficherTabEmp();
    afficherTabServices();
?>


   
<?php
} else {
    header("Location: signup&login_form.php");
}
?>
