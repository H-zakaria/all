<?php

include_once(__DIR__ . '/header.php');

if (!isset($_SESSION['user_id'])) {

    header("Location: signup&login_form.php");
}
afficherDetailsServ();
