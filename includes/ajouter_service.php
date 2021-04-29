<?php
include_once '../header.php';

$sql = "INSERT INTO serv(noserv, service, ville) VALUES('" . $_POST["noserv"] . "','" . $_POST["service"] . "','" . $_POST["ville"] . "');";
maQuery($sql, 'nop');
header("Location: ../tableau-connecte.php?Enregistrement=succes");
