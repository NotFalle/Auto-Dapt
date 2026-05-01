<?php

// Tar hand om värdena från formuläret
$username = $_POST['username'];
$email = $_POST['email'];
$password = $_POST['password'];
$password_confirm = $_POST['password_confirm'];

// Kontrollera att lösenorden matchar
if ($password !== $password_confirm) {
    header("Location: register-portal.php?error=password"); // Annars -> skickar tillbaka användaren
    exit;
}


// Skapa en databasuppkoppling
require_once('functions.php');
$db = connectToDb();

// Envägs-kryptering
$hashedPassword = password_hash($password, PASSWORD_DEFAULT);

// Spara den nya användaren i databasen
$statement = $db->prepare("INSERT INTO `autodapt-userdatabase` (username, password, email) VALUES (?, ?, ?)");
$statement->bind_param('sss', $username, $hashedPassword, $email);
$statement->execute();

// Skicka tillbaka till startsidan
header('Location: index.php');

?>
