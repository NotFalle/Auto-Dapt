<?php
    session_start();

    if ($_SERVER["REQUEST_METHOD"] !== "POST") {
        header("Location: register-portal.php");
        exit;
    }

    require_once('functions.php');

    $username = trim($_POST['username']);
    $password = $_POST['password'];

    // Kollar lösenord och användarnamn stämmer
    login($username, $password);

    // Hämtar data om användaren
    $user = getUserbyUsername($username);

    updateLastLogin($username);

    // Sätter sessionens variabler utifrån användarens data
    $_SESSION['loggedIn'] = TRUE;
    $_SESSION['userId'] = $user['id'];
    $_SESSION['username'] = $user['username'];
    $_SESSION['role'] = $user['role'];

    header('Location: index.php');

?>
