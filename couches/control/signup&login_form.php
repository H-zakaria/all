<?php
include_once(__DIR__ . '/../view/header.php');
include_once(__DIR__ . '/../view/Log_sign_form.php');
try{
    $empService = new EmployeService;
    $counter = $empService->ajoutsJour();
    showHeader($counter);
}catch(ServiceException $e){
    $e->getMessage();
    $e->getCode();
}
log_sign_form();
