<?php

require_once('functions.php');

$username = $_POST['username'];
$password = $_POST['password'];

$db = connectToDb();

// Hämta användaren (om den finns)
$statement = $db->prepare("SELECT * FROM `autodapt-userdatabase` WHERE username = ?");
$statement->bind_param('s', $username);
$statement->execute();
$result = $statement->get_result();
$user = $result->fetch_assoc();

// Om användaren inte finns eller lösenordet är fel
if (!$user || !password_verify($password, $user['password'])) {

    header("Location: login-portal.php?error=login");
    exit();
}

// Login lyckades
$_SESSION['loggedIn'] = TRUE;
$_SESSION['userId'] = $user['id'];
header('Location: index.php');

?>
