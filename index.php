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

    <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v7.1.0/css/all.css"/> 
    <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v7.1.0/css/sharp-solid.css"/>
    <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v7.1.0/css/sharp-regular.css"/>
    <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v7.1.0/css/sharp-light.css"/>
    <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v7.1.0/css/duotone.css"/>

    <link href="css/main.css" rel="stylesheet">
    <title>Auto-Dapt</title>
</head>

<body>
    <header>
        <div id="hdr-left">
            <p>ASD</p>
        </div>
        <div id="hdr-middle">
            <h1>Auto-Dapt</h1>
            <p><i>"Don’t adapt. Don’t waste. Just Auto-Dapt."</i></p>
        </div>
        <div id="hdr-right">
            <p>ASD</p>
        </div>
    </header>

    <script src="js/version.js"></script>
</body>

</html>