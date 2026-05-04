<?php

    // Load installed packages
    require_once 'vendor/autoload.php';

    // Load secrets from the file .env
    $dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
    $dotenv->load();


    // connectToDb()
    function connectToDb() {
        $dbHost = 'ostrawebb.se';
        $dbUser = $_ENV['DB_USER'];
        $dbPassword = $_ENV['DB_PASS'];
        $dbDatabase = $_ENV['DB_USER'];
        $db = new mysqli($dbHost, $dbUser, $dbPassword, $dbDatabase);    
        return $db;
    }

    // createUser($username, $password, $email)
    function createUser($username, $password, $email) {

        // Skapa en databasuppkoppling
        $db = connectToDb();

        // Envägs-kryptering
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        // Spara den nya användaren i databasen
        $statement = $db->prepare("INSERT INTO `autodapt-userdatabase` (username, password, email) VALUES (?, ?, ?)");
        $statement->bind_param('sss', $username, $hashedPassword, $email);
        $statement->execute();
    }

    // getUserByUsername($username)
    function getUserbyUsername($username) {

        // Skapa en databasuppkoppling
        $db = connectToDb();

        // Söker efter användaren i databasen
        $statement = $db->prepare("SELECT * FROM `autodapt-userdatabase` WHERE username = ?");
        $statement->bind_param('s', $username);
        $statement->execute();
        $result = $statement->get_result();

        // Skickar tillbaka användaren (om den finns)
        return $result->fetch_assoc();
    }

    // redirectWithMessage($url, $message)
    function redirectWithMessage($url, $message) {
        header("Location: $url?message=$message");
        exit;
    }

    function login($username, $password) {

        // Hämta användaren från databasen
        $user = getUserByUsername($username);

        // Kolla om lösenordet stämmer
        if (!$user || !password_verify($password, $user['password'])) {
            header("Location: login-portal.php?error=login");
            exit;
        }

        // Skicka tillbaka
        return $user;
    }

    // Update last login time
    function updateLastLogin($username) {

        // Skapa en databasuppkoppling
        $db = connectToDb();

        // Förbereder SQL-förfrågan
        $statement = $db->prepare("UPDATE `autodapt-userdatabase` SET last_login = NOW() WHERE username = ?");
        $statement->bind_param('s', $username);

        // Uppdaterar last_login i databasen
        $statement->execute();
    }

    // isLoggedIn()


?>