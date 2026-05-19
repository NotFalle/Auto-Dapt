<?php

    // Ladda in funktionerna
    require_once __DIR__ . "/../functions.php";

    if ($_SERVER["REQUEST_METHOD"] !== "POST") {
        header("Location: /src/portal/registrerings-portal.php");
        exit;
    }

    $db = connectToDb();

    // Ta hand om värdena från formuläret
    $username = $_POST['username'];
    $password = $_POST['password'];
    $email = $_POST['email'];
    $password_confirm = $_POST['password_confirm'];

    // Kontrollera att mail inte redan finns
    if (emailExists($email)) {
        header("Location: /src/portal/registrerings-portal.php?error=email");
        exit;
    }

    // Kontrollera att lösenorden matchar
    if ($password !== $password_confirm) {
        header("Location: /src/portal/registrerings-portal.php?error=password"); // Annars -> skickar tillbaka användaren
        exit;
    };

    // Envägs-kryptera (hasha) lösenordet
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // Spara den nya användaren i databasen
    $statement = $db->prepare("INSERT INTO `autodapt-userdatabase` (username, password, email) VALUES (?, ?, ?)");
    $statement->bind_param('sss', $username, $hashedPassword, $email);
    $statement->execute();

    // Skicka tillbaka till startsidan
    header('Location: /src/portal/inloggningsportal.php');


?>
