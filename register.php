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

    // Ladda in funktionerna
    require_once('functions.php');

    // Kontrollera att mail inte redan finns
    if (emailExists($email)) {
        header("Location: register-portal.php?error=email");
        exit;
    }

    // Kontrollera att lösenorden matchar
    if ($password !== $password_confirm) {
        header("Location: register-portal.php?error=password"); // Annars -> skickar tillbaka användaren
        exit;
    };

    // Skapa användaren
    createUser($username, $password, $email);

    // Skicka tillbaka till startsidan
    header('Location: index.php');

?>
