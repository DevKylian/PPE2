<?php

require '../backend/classes/user_class.php';
require '../backend/includes/db_inc.php';


if (isset($_POST['login'])){

    $username = $_POST['username'];
    $password = $_POST['password'];

    $user = new User();

    if ($user->login($username, $password))
    {
        session_start();
        $_SESSION['username'] = $username;
        $success = "Connexion réussie!";
        header("Location: dashboard.php");
        exit();
    }
    else {
        $error = "Erreur lors de la connexion, veuillez vérifier vos identifiants";
    }
}

if (isset($_POST['register'])){

    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $password_confirmation = $_POST['password_confirmation'];
    $birthdate = $_POST['birthdate'];

    $user = new User();
    try {
        $user->addUser($username, $firstname, $lastname, $email, $birthdate, $password);
        $success = "Inscription réussie ! Vous pouvez désormais vous connecter depuis ce <a href='/PPE2/frontend/login.php'>lien</a>";
    } catch (Exception $e) {
        /* Récupération de l'exception, et DIE */
        $error = $e->getMessage();
    }
}

