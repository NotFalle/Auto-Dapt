<?php
    session_start();

    if ($_SERVER["REQUEST_METHOD"] !== "POST") {
        header("Location: register-portal.php");
        exit;
    }

    // Tar hand om värdena från formuläret
    $username = trim($_POST['username']);
    $email = trim($_POST['email']);
    $password = $_POST['password'];
    $password_confirm = $_POST['password_confirm'];

    // Kontrollera att lösenorden matchar
    if ($password !== $password_confirm) {
        header("Location: register-portal.php?error=password"); // Annars -> skickar tillbaka användaren
        exit;
    };

    // Skapa en databasuppkoppling
    require_once('functions.php');

    // Skapa användaren
    createUser($username, $password, $email);

    // Skicka tillbaka till startsidan
    header('Location: index.php');

?>
