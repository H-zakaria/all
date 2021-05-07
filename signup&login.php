<?php

include_once(__DIR__ . '/header.php');

if (!isset($_SESSION['user_id'])) {

    header("Location: signup&login_form.php");
}
echo 'here1';

if (isset($_POST['submit_signup'])) {
    echo 'here2';

    $username = $_POST['username'];
    $password = $_POST['password'];

    if (empty($username) || empty($password)) {
        header("Location: signup&login_form.php?error=emptyfields&username=" . $username);
        echo 'here3';

        exit();
    } else if (!preg_match("/^[a-zA-Z0-9]*$/", $username)) {
        header("Location: signup&login_form.php?error=invalidusername");
        echo 'here4';

        exit();
    } else {
        $userService = new UserService();
        $usernames = $userService->checkUsername($username);


        if ($usernames[0]['nom'] > 0) {
            header("Location: signup&login_form.php?error=usernametaken");
            exit();
        } else {
            $userService = new UserService();
            $created = $userService->createUser($username, $password); //objet user

            if (!$created) {
                echo "erreur: l'utilisateur n'a pas pu être crée";
            } else {
                header("Location: signup&login_form.php?signup=success");
            }
        }
    }
} else if (isset($_POST['submit_login'])) {

    $username = $_POST['username'];
    $password = $_POST['password'];

    if (empty($username) || empty($password)) {
        header("Location: signup&login_form.php?error=emptyfields&username=" . $username);
        exit();
    } else if (!preg_match("/^[a-zA-Z0-9]*$/", $username)) {
        header("Location: signup&login_form.php?error=invalidusername");
        exit();
    } else {   //voir si le nom existe 

        $userService = new UserService();
        $usernames = $userService->checkUsername($username);

        if ($usernames[0]['nom'] == 1) {                               //si oui voir si le mdp est correct

            $sql = "SELECT * FROM users WHERE nom='$username';";
            $user = $userService->selectUserInfo($username);

            $pswrd_check = password_verify($password, $user[0]['mdp']);
            if ($pswrd_check == false) {
                header("Location: signup&login_form.php?error=wrongpassword");
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
            header("Location: signup&login_form.php?error=wrongusername");
            exit();
        }
    }
} else {
    echo 'here last else';
    header("Location: signup&login_form.php");
}


?>
</body>

</html>