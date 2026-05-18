<?php

    require_once "src/functions.php";
    trackVisitor();

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

    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/fonts.css">

    <title>Medlemmar</title>
</head>
<style> /* ENDAST TEMPORÄR  -  TA BORT SNARAST! */

body {
    font-family: Arial, sans-serif;
    background-color: #f0f0f0;
    color: #333;
    text-align: center;
    padding: 50px;
}


</style>
<body>
    <h1>Välkommen till medlemssidorna!</h1>
    <br>
    <?php
    echo "<h2>Hej <i>" . $_SESSION['username'] . "</i>!</h2>";
    
    if(isset($_SESSION['role']) && $_SESSION['role'] == "admin"){
        echo "<h2>Status: <i class='admin'>" . $_SESSION['role'] . "</i></h2>";
        echo "<a href='src/admin/admin-panel.php'>Admin panelen</a>";
    } else {
        echo "<h2>Status: <i class='user'>" . $_SESSION['role'] . "</i></h2>";
    }

    ?>

    <br>
    <br>
    <a href="index.php">Tillbaka</a>
    <a href="src/user/settings.php">Inställningar</a>
    <a href="src/auth/logout.php">Logga ut</a>
    
    <script src="js/ping.js"></script>
</body>
</html>