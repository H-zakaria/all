<?php
include_once(__DIR__ . '/../exceptions/ServiceException.php');
include_once(__DIR__ . '/../Service/UserService.php');


if (!isset($_SESSION['user_id'])) {

  header("Location: form_login.php");
}

if (isset($_POST['submit_signup'])) {

  $username = $_POST['username'];
  $password = $_POST['password'];

  if (empty($username) || empty($password)) {
    header("Location: form_signup.php?signup=emptyfields&username=" . $username);


    exit();
  } else if (!preg_match("/^[a-zA-Z0-9]*$/", $username)) {
    header("Location: form_signup.php?signup=invalidusername");

    exit();
  } else {
    $userService = new UserService();
    try {
      $usernames = $userService->checkUsername($username);
    } catch (ServiceException $e) {
    }



    if ($usernames[0]['nom'] > 0) {
      header("Location: form_signup.php?signup=usernametaken");
      exit();
    } else {
      $userService = new UserService();
      try {
        $created = $userService->createUser($username, $password); //objet user
      } catch (ServiceException $e) {
      }

      header("Location: form_signup.php?signup=success");
    }
  }
} else if (isset($_POST['submit_login'])) {

  $username = $_POST['username'];
  $password = $_POST['password'];

  if (empty($username) || empty($password)) {
    header("Location: form_login.php?login=emptyfields&username=" . $username);
    exit();
  } else if (!preg_match("/^[a-zA-Z0-9]*$/", $username)) {
    header("Location: form_login.php?login=invalidusername");
    exit();
  } else {   //voir si le nom existe 

    $userService = new UserService();
    try {
      $usernames = $userService->checkUsername($username);
    } catch (ServiceException $e) {
    }

    if ($usernames[0]['nom'] == 1) {                               //si oui voir si le mdp est correct

      try {

        $user = $userService->selectUserInfo($username);
      } catch (ServiceException $e) {
      }

      $pswrd_check = password_verify($password, $user[0]['mdp']);
      if ($pswrd_check == false) {
        header("Location: form_login.php?login=wrong&username=" . $username);
        exit();
      } else        //si oui ouvrir une session
      {
        session_start();
        $_SESSION['user_id'] = $user[0]['user_id'];
        $_SESSION['nom'] = $user[0]['nom'];
        $_SESSION['profil'] = $user[0]['profil'];

        header("Location: tableau-connecte.php?login=success");
        exit();
      }
    } else {
      header("Location: form_login.php?login=wrong&username=" . $username);
      exit();
    }
  }
} else {

  header("Location: form_login.php");
}
