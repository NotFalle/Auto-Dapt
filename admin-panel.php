<?php
    session_start();

    require_once('functions.php');

    if (
        // Om inte session-variabel finns eller inte är TRUE
        !isset($_SESSION['loggedIn']) || $_SESSION['loggedIn'] != TRUE ||

        // Om ingen roll eller fel roll -> skicka iväg användaren
        // Annars om rollen finns och är admin -> visar admin-sidan
        !isset($_SESSION['role']) || $_SESSION['role'] !== "admin"
    ) {
        // Skicka iväg användaren
        header('Location: index.php');
        exit();
    }
?>

<!--
<!DOCTYPE html>
<html lang="sv">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel - Autodapt</title>
</head>
<body>
    <a href="index.php">Tillbaka</a>
</body>
</html> -->

<!DOCTYPE html>
<html lang="sv">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Admin Panel</title>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">
<style>
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: 'Inter', sans-serif;
}

body {
    display: flex;
    height: 100vh;
    background: #f5f7fb;
}

/* Sidebar */
.sidebar {
    width: 250px;
    background: #111827;
    color: white;
    padding: 20px;
}

.sidebar h2 {
    margin-bottom: 30px;
}

.sidebar a {
    display: block;
    color: #9ca3af;
    text-decoration: none;
    padding: 10px;
    border-radius: 8px;
    margin-bottom: 10px;
}

.sidebar a:hover {
    background: #1f2937;
    color: white;
}

/* Main */
.main {
    flex: 1;
    padding: 20px;
}

.header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 20px;
}

.card-container {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
    gap: 20px;
}

.card {
    background: white;
    padding: 20px;
    border-radius: 16px;
    box-shadow: 0 4px 10px rgba(0,0,0,0.05);
}

.card h3 {
    margin-bottom: 10px;
}

.table {
    margin-top: 30px;
    background: white;
    border-radius: 16px;
    overflow: hidden;
    box-shadow: 0 4px 10px rgba(0,0,0,0.05);
}

.table table {
    width: 100%;
    border-collapse: collapse;
}

.table th, .table td {
    padding: 15px;
    text-align: left;
}

.table th {
    background: #f9fafb;
}

.table tr:not(:last-child) {
    border-bottom: 1px solid #eee;
}

.btn {
    padding: 8px 12px;
    border: none;
    border-radius: 8px;
    cursor: pointer;
}

.btn-edit {
    background: #3b82f6;
    color: white;
}

.btn-delete {
    background: #ef4444;
    color: white;
}
</style>
</head>
<body>

<div class="sidebar">
    <h2>Admin</h2>
    <a href="#">Dashboard</a>
    <a href="#">Användare</a>
    <a href="#">Inställningar</a>
    <a href="#">Logga ut</a>
</div>

<div class="main">
    <div class="header">
        <h1>Dashboard</h1>
        <p>Välkommen, Admin</p>
    </div>

    <div class="card-container">
        <div class="card">
            <h3>Användare</h3>
            <p>120</p>
        </div>
        <div class="card">
            <h3>Aktiva</h3>
            <p>85</p>
        </div>
        <div class="card">
            <h3>Nya idag</h3>
            <p>5</p>
        </div>
    </div>

    <div class="table">
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Namn</th>
                    <th>Email</th>
                    <th>Roll</th>
                    <th>Åtgärder</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>Anna</td>
                    <td>anna@mail.com</td>
                    <td>admin</td>
                    <td>
                        <button class="btn btn-edit">Edit</button>
                        <button class="btn btn-delete">Delete</button>
                    </td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>Erik</td>
                    <td>erik@mail.com</td>
                    <td>user</td>
                    <td>
                        <button class="btn btn-edit">Edit</button>
                        <button class="btn btn-delete">Delete</button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

</body>
</html>