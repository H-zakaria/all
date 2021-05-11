<?php
include_once(__DIR__ . '/../view/header.php');
include_once(__DIR__ . '/../view/show_signup.php');
try{
    $empService = new EmployeService;
    $counter = $empService->ajoutsJour();
    showHeader($counter);
}catch(ServiceException $e){
    $e->getMessage();
    $e->getCode();
}
show_signup();