<?php
include_once '../header.php';

$noserv = $_GET['noserv'];
$sql = "DELETE FROM serv WHERE Noserv = '$noserv';";
maQuery($sql, 'nop');
header("Location: ../tableau-connecte.php?suppression=succes");
