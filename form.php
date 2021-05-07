<?php

include_once(__DIR__ . '/header.php');
include_once(__DIR__ . '/couches/Service/EmployeService.php');
include_once(__DIR__ . '/couches/Model/Employe2.php');
include_once(__DIR__ . '/couches/view/Log_sign_form.php');

if (!isset($_SESSION['user_id'])) {

    header("Location: signup&login_form.php");
}

$empService = new EmployeService;
$superieurs = $empService->selectInfosSups();
print_r($superieurs);
?>
<br>
<br>
<br>
<br>
<br>
<?php
foreach ($superieurs as $sup) {

    $thiss = $sup->getNoemp();
    echo $thiss;
}
log_sign_form();


?>