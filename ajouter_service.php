<?php
include_once(__DIR__ . '/header.php');

if (!isset($_SESSION['user_id'])) {

    header("Location: signup&login_form.php");
}


$sql = "INSERT INTO serv(noserv, service, ville) VALUES('" . $_POST["noserv"] . "','" . $_POST["service"] . "','" . $_POST["ville"] . "');";
maQuery($sql, 'nop');
header("Location: tableau-connecte.php?Enregistrement=succes");
