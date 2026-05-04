<?php
    session_start();

    // Om inte session-variabel finns eller inte är TRUE
    if (!isset($_SESSION['loggedIn']) || $_SESSION['loggedIn'] != TRUE) {
        header('Location: index.php');
        exit();
    }

    // Destruera sessionen
    session_destroy();

    // Omdirigera till startsidan
    header('Location: index.php');
    exit();
?>