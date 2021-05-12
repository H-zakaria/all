<?php
include_once(__DIR__ . '/../view/header.php');
include_once(__DIR__ . '/../view/show_login.php');
include_once(__DIR__ . '/../Service/EmployeService.php');
include_once(__DIR__ . '/../exceptions/ServiceException.php');

try {
  $empService = new EmployeService;
  $counter = $empService->ajoutsJour();
  showHeader($counter['count']);
} catch (ServiceException $e) {
  $e->getMessage();
  $e->getCode();
}
show_login();
