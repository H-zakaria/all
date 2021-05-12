<?php
include_once(__DIR__ . '/../view/header.php');
include_once(__DIR__ . '/../view/show_signup.php');
include_once(__DIR__ . '/../exceptions/ServiceException.php');
include_once(__DIR__ . '/../Service/EmployeService.php');

try {
  $empService = new EmployeService;
  $counter = $empService->ajoutsJour();
  showHeader($counter['count']);
} catch (ServiceException $e) {
  $e->getMessage();
  $e->getCode();
}
show_signup();
