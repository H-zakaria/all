<?php

include_once(__DIR__ . '/../DAO/UserDAO.php');
include_once(__DIR__ . '/../Model/User.php');

class UserService
{


    function checkUsername($username)
    {
        $userDAO = new UserDAO();
        return $userDAO->checkUsername($username);
    }
    function createUser($username, $password)
    {

        $userDAO = new UserDAO();
        return $userDAO->createUser($username, $password);
    }
    // function createUser($username, $password)
    // {
    //     $newUser = new User();
    //     $newUser->setNom($username)->setMdp($password);
    //     $userDAO = new UserDAO();
    //     return $userDAO->createUser($newUser);
    // } ne fonctionne pas dans le browser =>
    //
    // Fatal error: Uncaught TypeError: Argument 1 passed to UserDAO::createUser() must be an instance of User, string given, called in C:\xampp\htdocs\Prog\Afpa\gestion_emp_Rep\couches\Service\UserService.php on line 25 and defined in C:\xampp\htdocs\Prog\Afpa\gestion_emp_Rep\couches\DAO\UserDAO.php:20 Stack trace: #0 C:\xampp\htdocs\Prog\Afpa\gestion_emp_Rep\couches\Service\UserService.php(25): UserDAO->createUser('Admin') #1 C:\xampp\htdocs\Prog\Afpa\gestion_emp_Rep\includes\signup&login.php(65): UserService->selectUserInfo('Admin') #2 {main} thrown in C:\xampp\htdocs\Prog\Afpa\gestion_emp_Rep\couches\DAO\UserDAO.php on line 20

    function selectUserInfo($username)
    {
        $userDAO = new UserDAO();
        return $userDAO->selectUserInfo($username);
    }
}
