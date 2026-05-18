<?php

    require_once __DIR__ . "/../functions.php";

    $username = $_POST['username'];
    $password = $_POST['password'];

    $db = connectToDb();

    // Hämta användaren (om den finns)
    $statement = $db->prepare("SELECT * FROM `autodapt-userdatabase` WHERE username = ?");
    $statement->bind_param('s', $username);
    $statement->execute();
    $result = $statement->get_result();
    $user = $result->fetch_assoc();

    // Om användaren inte finns: tillbaka till index.php
    if ( ! $user) {
        header('Location: /index.php');
        exit();
    }

    $hashedPassword = $user['password'];

    // Om lösenorden inte stämmer: tillbaka till index.php
    if ( ! password_verify($password, $hashedPassword)) {
        header('Location: /index.php');
        exit();
    }

    // uppdaterar last_login
    updateLastLogin($username);

    // Sätter sessionens variabler utifrån användarens data
    $_SESSION['loggedIn'] = true;
    $_SESSION['user_id'] = $user['user_id'];
    $_SESSION['username'] = $user['username'];
    $_SESSION['role'] = $user['role'];

    header('Location: /src/user/settings.php');

?>
