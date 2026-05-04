<?php
    session_start();

    require_once('functions.php');

    // Om inte session-variabel finns eller inte är TRUE
    if (!isset($_SESSION['loggedIn']) || $_SESSION['loggedIn'] != TRUE) {
        header('Location: index.php');
        exit();
    }
?>

<!DOCTYPE html>
<html lang="sv">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Medlemmar</title>
</head>
<body>
    <h1>Välkommen till medlemssidorna!</h1>
    <a href="index.php">Tillbaka</a>
    <a href="logout.php">Logga ut</a>
</body>
</html>