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

<!DOCTYPE html>
<html lang="sv">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="/css/fonts.css">

    <title>Admin Panel</title>
</head>
<body>

    <section id="admin-panel-body">
        <div class="sidebar">
            <h2>Admin</h2>
            <a href="" class="active hover-animation">Dashboard</a>
            <a href="admin-panel-users.php" class="hover-animation">Användare</a>
            <a href="/src/user/settings.php" class="hover-animation">Inställningar</a>
            <a href="/src/auth/logout.php" class="hover-animation">Logga ut</a>
        </div>

        <div class="panel-layout">
            <div class="header">
                <h1>Dashboard</h1>

                <i>*Aktiviten mäts i de senaste 3 minuterna*</i>

                <?php
                    echo "<p>Välkommen, " . $_SESSION['username'] . "</p>";
                ?>

            </div>

            <div class="card-container">
                <div class="card">
                    <h3>Antal konton</h3>
                    <span id="totalAccounts"><?php echo $stats['total_accounts'];?></span>
                </div>

                <div class="card">
                    <h3>Aktiva konton</h3>
                    <span id="activeLoggedInUsers"><?php echo $stats['active_logged_in_users'];?></span>
                </div>

                <div class="card">
                    <h3>Aktiva besökare</h3>
                    <span id="activeVisitors"><?php echo $stats['active_visitors'];?></span>
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
                        </tr>
                    </thead>
                    <tbody>
                        <?php if ($result->num_rows > 0) {

                            while ($row = $result->fetch_assoc()) {

                                echo"<tr>";
                                    echo "<td>" . htmlspecialchars($row['user_id']) . "</td>";
                                    echo "<td>" . htmlspecialchars($row['username']) . "</td>";
                                    echo "<td>" . htmlspecialchars($row['email']) . "</td>";
                                    echo "<td>" . htmlspecialchars($row['role']) . "</td>";
                                echo "</tr>";

                            } 

                        } else {
                            echo "<tr>";
                                echo "<td id='no-active-accounts' colspan='7'>Inga aktiva konton</td>";
                            echo "</tr>";
                        }
                        
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </section>

    <script src="/js/admin-panel.js"></script>
</body>
</html>