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
:root {
    /* Admin design */
    --ad-background: #f5f7fb;
    --ad-primary: white;
    --ad-secondary: #111827;
    --ad-secondary-hover: #1f2937;

    --ad-font-dark: black;
    --ad-font-light: white;
    --ad-font-lightdark: #9ca3af;

    --ad-boxshadow: 0 4px 10px rgba(0,0,0,0.05);

    --ad-light-table-hdr: #3e46b0;
    --ad-light-table-seperator: rgb(103, 103, 164);

    --ad-edit-btn: #3b82f6;
    --ad-delete-btn: #ef4444;

}


* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: 'Inter', sans-serif;
}

body {
    display: flex;
    height: 100vh;
    background: var(--ad-background);
}

/* Sidebar */
.sidebar {
    width: 250px;
    background: var(--ad-secondary);
    color: white;
    padding: 20px;
}

.sidebar h2 {
    margin-bottom: 30px;
}

.sidebar a {
    display: block;
    color: var(--ad-font-lightdark);
    text-decoration: none;
    padding: 10px;
    border-radius: 8px;
    margin-bottom: 10px;
}

.sidebar a:hover {
    background: var(--ad-secondary-hover);
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
    background: var(--ad-primary);
    padding: 20px;
    border-radius: 16px;
    box-shadow: var(--ad-boxshadow);
}

.card h3 {
    margin-bottom: 10px;
}

.table {
    margin-top: 30px;
    background: var(--ad-primary);
    border-radius: 16px;
    overflow: hidden;
    box-shadow: var(--ad-boxshadow);
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
    background: var(--ad-light-table-hdr);
}

.table tr:not(:last-child) {
    border-bottom: 2px solid var(--ad-light-table-seperator);
}

.btn {
    padding: 8px 12px;
    border: none;
    border-radius: 8px;
    cursor: pointer;
}

.btn-edit {
    background: var(--ad-edit-btn);
    color: var(--ad-font-light);
}

.btn-delete {
    background: var(--ad-delete-btn);
    color: var(--ad-font-light);
}

.active {
    background: var(--ad-secondary-hover);
}

.hover-animation {
    cursor: pointer;
    transition: 0.8s;
}

.hover-animation:hover {
    transform: scale(1.02);
    transition: 1.2s;
}


</style>
</head>
<body>

<div class="sidebar">
    <h2>Admin</h2>
    <a href="" class="active hover-animation">Dashboard</a>
    <a href="#" class="hover-animation">Användare</a>
    <a href="#" class="hover-animation">Inställningar</a>
    <a href="#" class="hover-animation">Logga ut</a>
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
                    <th>Senast inloggad</th>
                    <th>Konto skapad</th>
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