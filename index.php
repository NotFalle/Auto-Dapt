<?php

// Load installed packages
require_once 'vendor/autoload.php';

// Load secrets from the file .env
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

require 'db.php'; // Gets the database

// Get all movies
$result = $db->query("SELECT * FROM movies");
$movies = $result->fetch_all(MYSQLI_ASSOC);

?>


<!DOCTYPE html>
<html lang="sv">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Load Font Awesome -->
    <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v7.1.0/css/all.css"/> 
    <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v7.1.0/css/sharp-solid.css"/>
    <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v7.1.0/css/sharp-regular.css"/>
    <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v7.1.0/css/sharp-light.css"/>
    <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v7.1.0/css/duotone.css"/>

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com"> 
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin> 
    <link href="https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,200..1000;1,200..1000&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

    <!-- Load CSS files and set title -->
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/fonts.css">
    <title>Auto-Dapt</title>
</head>

<body>
    <header>
        <div id="hdr-bar">
            <div class="hdr-boxes">
                <p>Meny</p>
            </div>
            <div id="brand" style="background-color: grey;">
                <h1 class="poppins-700">Auto-Dapt</h1>
                <p class="nunito-400"><i>"Don’t adapt. Don’t waste. Just Auto-Dapt."</i></p>
            </div>
            <div class="hdr-boxes">
                <p>Logga in</p>
            </div>
        </div>



    </header>

    <script src="js/version.js"></script>
</body>

</html>