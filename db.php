<?php
// Connect to the database
$db = new mysqli('ostrawebb.se', $_ENV['DB_USER'], $_ENV['DB_PASS'], $_ENV['DB_USER']);

// Checks if database connection is valid
if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
}

?>