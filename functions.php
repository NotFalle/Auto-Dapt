<?php
// Load installed packages
require_once 'vendor/autoload.php';

// Load secrets from the file .env
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

session_start();

function connectToDb() {
    $dbHost = 'ostrawebb.se';
    $dbUser = $_ENV['DB_USER'];
    $dbPassword = $_ENV['DB_PASS'];
    $dbDatabase = $_ENV['DB_USER'];
    $db = new mysqli($dbHost, $dbUser, $dbPassword, $dbDatabase);    
    return $db;
}


?>