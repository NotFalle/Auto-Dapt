<?php

    // Hämta functions
    require_once __DIR__ . "/../functions.php";
    trackVisitor();

    // Om inte är admin ->
    if (!isAdmin()) {
        // -> skicka iväg användaren.
        header('Location: index.php');
        exit();
    }

    $result = getActiveUsersList();

    $stats = getStats();

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

    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="/css/fonts.css">
    <link rel="stylesheet" href="/css/temp-admin.css">

    <title>Inställningar - Admin Panel</title>
</head>
<body>

    <section id="admin-panel-body">
        <div class="sidebar">
            <h2>Admin</h2>
            <a href="admin-panel.php" class="hover-animation">Dashboard</a>
            <a href="admin-panel-users.php" class="hover-animation">Användare</a>
            <a href="" class="active hover-animation">Inställningar</a>
            <a href="/src/auth/logout.php" class="hover-animation">Logga ut</a>
        </div>

        <div class="panel-layout">
            <div class="header">
                <h1>Inställningar</h1>

                <i>*Aktiviten mäts i de senaste 3 minuterna*</i>

                <?php
                    echo "<p>Välkommen, " . $_SESSION['username'] . "</p>";
                ?>

            </div>

        </div>
    </section>

</body>
</html>