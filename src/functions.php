<?php

    // Load installed packages
    require_once __DIR__ . "/../vendor/autoload.php";

    // Load secrets from the file .env
    $dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . "/../");
    $dotenv->load();

    session_start();

    // connectToDb()
    function connectToDb() {

        // Definerar variabler
        $dbHost = 'ostrawebb.se';
        $dbUser = $_ENV['DB_USER'];
        $dbPassword = $_ENV['DB_PASS'];
        $dbDatabase = $_ENV['DB_USER'];

        // Startar en databas koppling
        $db = new mysqli($dbHost, $dbUser, $dbPassword, $dbDatabase);    

        // Felmeddelande vid misslyckande
        if ($db->connect_error) {
            die("Databasanslutning misslyckades: " . $db->connect_error);
        }

        // Skickar tillbaka databas uppkopplingen
        return $db;
        
    }

    // redirectWithMessage($url, $message)
    function redirectWithMessage($url, $message) {
        header("Location: $url?message=$message");
        exit;
    }

    // createUser($username, $password, $email)
    function createUser($username, $password, $email) {

        // Hämta en databasuppkoppling
        $db = connectToDb();

        // Envägs-kryptering
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        // Spara den nya användaren i databasen
        $statement = $db->prepare("INSERT INTO `autodapt-userdatabase` (username, password, email) VALUES (?, ?, ?)");
        $statement->bind_param('sss', $username, $hashedPassword, $email);
        $statement->execute();

        // Skicka tillbaka till startsidan
        header('Location: /src/portal/login-portal.php');

    }

    // getUserbyId($id)
    function getUserbyId($id) {

        // Hämta en databasuppkoppling
        $db = connectToDb();

        // Skapa en SQL-förfrågan
        $statement = $db->prepare("
            SELECT *
            FROM `autodapt-userdatabase`
            WHERE user_id = ?
            LIMIT 1
        ");
        $statement->bind_param('i', $id);
        $statement->execute(); // Skickar förfrågan

        // Hämtar resultatet
        $result = $statement->get_result();

        // Sparar resultatet i en variabel
        $user = $result->fetch_assoc();

        // Stänger statement och databas uppkopplingen
        $statement->close();
        $db->close();

        // Skickar vidare användarens data
        return $user;
    }

    // getUserbyUsername()
    function getUserbyUsername($username) {

        // Hämta en databasuppkoppling
        $db = connectToDb();

        // Skapa en SQL-förfrågan
        $statement = $db->prepare("
            SELECT *
            FROM `autodapt-userdatabase`
            WHERE username = ?
            LIMIT 1
        ");
        $statement->bind_param('s', $username);
        $statement->execute(); // Skickar förfrågan

        // Hämtar resultatet
        $result = $statement->get_result();

        // Sparar resultatet i en variabel
        $user = $result->fetch_assoc();

        // Stänger statement och databas uppkopplingen
        $statement->close();
        $db->close();

        // Skickar vidare användarens data
        return $user;

    }

    // getActiveUsersList
    function getActiveUsersList() {

        // Hämta en databas uppkoppling
        $db = connectToDb();

        // Förbered en SQL-förfrågan
        $statement = $db->prepare("
            SELECT u.user_id, u.username, u.email, u.role, u.last_login, u.created_at, av.last_seen
            FROM `autodapt-active-visitors` av
            JOIN `autodapt-userdatabase` u ON av.visitor_id = u.user_id
            WHERE av.visitor_id IS NOT NULL
            AND av.last_seen >= NOW() - INTERVAL 3 MINUTE
            ORDER BY av.last_seen DESC
        ");

        // Skicka SQL-förfrågan
        $statement->execute();

        // Spara resultatet
        $result = $statement->get_result();

        // Skicka resultatet
        return $result;

    }

    // getAllUsersList()
    function getAllUsersList() {

        // Hämta en databas uppkoppling
        $db = connectToDb();

        // Förbered en SQL-förfrågan
        $statement = $db->prepare("
            SELECT 
                user_id,
                username,
                email,
                role,
                last_login,
                created_at,
                last_seen
            FROM `autodapt-userdatabase`
            ORDER BY 
                last_seen IS NULL,
                last_seen DESC
        ");

        // Skicka SQL-förfrågan
        $statement->execute();

        // Spara resultatet
        $result = $statement->get_result();

        // Skicka resultatet
        return $result;

    }

    // simpleRequest()
    function simpleRequest($message) {

        // Hämta databas uppkoppling
        $db = connectToDb();

        // Förbered SQL-förfrågan
        $request = $db->prepare($message);
        $request->execute(); // utför
        $result = $request->get_result(); // spara resultat

        // Sparar var rad för sig
        $row = $result->fetch_assoc();

        // Stänger frågan samt databas uppkopplingen
        $request->close();
        $db->close();

        // skicka resultatet
        return $row;

    }

    // emailExists($email)
    function emailExists($email) {
        
        // Skapa en databasuppkoppling
        $db = connectToDb();

        // Gör redo en SQL-fråga
        $statement = $db->prepare("SELECT 1 FROM `autodapt-userdatabase` WHERE email = ? LIMIT 1");
        $statement->bind_param("s", $email);

        // Kör SQL-frågan
        $statement->execute();

        // Sparar resultatet
        $result = $statement->get_result();

        // Skickar tillbaka true om e-postadressen finns, annars false
        return $result->num_rows > 0;
    }

    function login($username, $password) {

        // Hämta användaren från databasen
        $user = getUserbyUsername($username);

        // Om användaren inte finns: tillbaka till index.php
        if ( ! $user) {
            header('Location: /index.php');
            exit();
        }

        $hashedPassword = $user['password'];

        // Om lösenorden inte stämmer: tillbaka till index.php
        if ( ! password_verify($password, $hashedPassword)) {
            header('Location: /index.php');
            exit();
        }

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
    function isLoggedIn() {

        // Om variabeln finns OCH om värdet är strikt sant DÅ returneras true, annars false.
        return isset($_SESSION['loggedIn']) && $_SESSION['loggedIn'] === true;

    }

    // isAdmin()
    function isAdmin() {

        if (isLoggedIn()) {

            // Om variabeln finns OCH om värdet är strikt sant DÅ returneras true, annars false.
            return isset($_SESSION['role']) && $_SESSION['role'] === "admin";

        } else {

            // Om användaren inte är inloggad.
            return false;

        }
    }

    function trackVisitor() {

        // Om kaka tom -> skapa, annars sätt visitorId till kakan.
        if (empty($_COOKIE['cookie_id'])) {
            $visitorId = bin2hex(random_bytes(32));

            setcookie("cookie_id", $visitorId, [
                "expires" => time() + 60 * 60 * 24 * 365,
                "path" => "/",
                "httponly" => true,
                "secure" => (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off'),
                "samesite" => "Lax"
            ]);
        } else {
            $visitorId = $_COOKIE['cookie_id'];
        }

        // user_id är samma som session_user_id, annars null
        $user_id = $_SESSION['user_id'] ?? null;

        // skapa en databas uppkoppling
        $db = connectToDb();

        // Om $user_id inte är lika med null
        if ($user_id != null) {

            // Förbereder SQL-förfrågan att få uppdatera last_seen till NOW()
            $tmp_req = $db->prepare("
                UPDATE `autodapt-userdatabase`
                SET last_seen = NOW()
                WHERE user_id = ?
            ");

            // Kollar om tmporary request är gilitgt
            if (!$tmp_req) {
                return;
            }

            // Sätter in values och utför förfrågan
            $tmp_req->bind_param("i", $user_id);
            $tmp_req->execute();

            // Avslutar förfrågan.
            $tmp_req->close();
        } 

        // Förbereder en SQL-förfrågan
        $statement = $db->prepare("
            INSERT INTO `autodapt-active-visitors` (cookie_id, visitor_id, last_seen)
            VALUES (?, ?, NOW())
            ON DUPLICATE KEY UPDATE
                visitor_id = VALUES(visitor_id),
                last_seen = NOW()
        ");

        // Kollar om statement är gilitgt
        if (!$statement) {
            return;
        }

        // Sätter in values och utför förfrågan
        $statement->bind_param("ss", $visitorId, $user_id);
        $statement->execute();

        // Stänger ner databas uppkopplingen samt förfrågan.
        $statement->close();
        $db->close();
    }

    function getStats() {

        $stats = [];

        $stats['total_accounts'] = simpleRequest("
            SELECT COUNT(*) AS total_accounts
            FROM `autodapt-userdatabase`
        ")['total_accounts'];

        $stats['active_visitors'] = simpleRequest("
            SELECT COUNT(*) AS active_visitors
            FROM `autodapt-active-visitors`
            WHERE last_seen >= NOW() - INTERVAL 3 MINUTE
        ")['active_visitors'];

        $stats['active_logged_in_users'] = simpleRequest("
            SELECT COUNT(DISTINCT visitor_id) AS active_logged_in_users
            FROM `autodapt-active-visitors`
            WHERE visitor_id IS NOT NULL
            AND last_seen >= NOW() - INTERVAL 3 MINUTE
        ")['active_logged_in_users'];

        return $stats;
    }


?>