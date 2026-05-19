<?php

    // Hämta functions
    require_once __DIR__ . "/../functions.php";

    // Om användaren inte är inloggad skickas den tillbaka
    if (!isLoggedIn()) {
        header("Location: /produkter.php#reviews");
        exit;
    }

    // Hämta meddelande från formulär
    $message = trim($_POST["message"] ?? "");

    // Om meddelandet är tomt skickas användaren tillbaka
    if ($message === "") {
        header("Location: /produkter.php#reviews");
        exit;
    }

    // Om meddelandet är för långt skickas användaren tillbaka
    if (strlen($message) > 255) {
        header("Location: /produkter.php#reviews");
        exit;
    }

    // Hämta användaren
    $user = getUserbyId($_SESSION["user_id"]);

    // Om användaren inte finns skickas den tillbaka
    if (!$user) {
        header("Location: /produkter.php#reviews");
        exit;
    }

    // Hämta användarens id och namn
    $userId = $user["user_id"];
    $username = $user["username"];

    // Spara meddelandet
    createComment($userId, $username, $message);

    // Skicka tillbaka till reviews
    header("Location: /produkter.php#reviews");
    exit;

?>