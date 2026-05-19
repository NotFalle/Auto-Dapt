<?php
    require_once __DIR__ . "/../functions.php";
    trackVisitor();
?>

<!DOCTYPE html>
<html lang="sv">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <!-- Load Font Awesome -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/rizmyabdulla/fontawesome-pro@main/releases/v7.2.0/css/fontawesome.css"/>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/rizmyabdulla/fontawesome-pro@main/releases/v7.2.0/css/sharp-solid.css"/>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/rizmyabdulla/fontawesome-pro@main/releases/v7.2.0/css/sharp-regular.css"/>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/rizmyabdulla/fontawesome-pro@main/releases/v7.2.0/css/sharp-light.css"/>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/rizmyabdulla/fontawesome-pro@main/releases/v7.2.0/css/duotone.css"/>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/rizmyabdulla/fontawesome-pro@main/releases/v7.2.0/css/solid.css"/>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/rizmyabdulla/fontawesome-pro@main/releases/v7.2.0/css/regular.css"/>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/rizmyabdulla/fontawesome-pro@main/releases/v7.2.0/css/light.css"/>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/rizmyabdulla/fontawesome-pro@main/releases/v7.2.0/css/brands.css"/>

        <!-- Additional Icons for v7.2.0 -->

    <!-- Sharp Duotone -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/rizmyabdulla/fontawesome-pro@main/releases/v7.2.0/css/sharp-duotone-solid.css"/>
    <!-- Chisel -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/rizmyabdulla/fontawesome-pro@main/releases/v7.2.0/css/chisel-regular.css"/>
    <!-- Etch -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/rizmyabdulla/fontawesome-pro@main/releases/v7.2.0/css/etch-solid.css"/>
    <!-- Graphite -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/rizmyabdulla/fontawesome-pro@main/releases/v7.2.0/css/graphite-thin.css"/>
    <!-- Jelly -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/rizmyabdulla/fontawesome-pro@main/releases/v7.2.0/css/jelly-regular.css"/>
    <!-- Notdog -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/rizmyabdulla/fontawesome-pro@main/releases/v7.2.0/css/notdog-solid.css"/>
    <!-- Slab -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/rizmyabdulla/fontawesome-pro@main/releases/v7.2.0/css/slab-regular.css"/>
    <!-- Thumb Print -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/rizmyabdulla/fontawesome-pro@main/releases/v7.2.0/css/thumbprint-light.css"/>
    <!-- Utility -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/rizmyabdulla/fontawesome-pro@main/releases/v7.2.0/css/utility-semibold.css"/>
    <!-- Whiteboard -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/rizmyabdulla/fontawesome-pro@main/releases/v7.2.0/css/whiteboard-semibold.css"/>

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com"> 
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin> 
    <link href="https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,200..1000;1,200..1000&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

    <!-- Load CSS files and set title -->
    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="/css/fonts.css">
    <title>Logga in - Auto-Dapt</title>
</head>

<body>
    <section class="form-nav">
        <a href="/index.php" class="btn-info form-nav-btn btn-animation">Tillbaka</a>
    </section>
    <section class="form">

        <form action="/src/auth/login.php" method="POST">
            <div class="form-hdr">
                <h1 class="poppins-700">Logga in</h1>
            </div>
            <div class="form-body">
                <p>Logga in på ditt konto för att fortsätta.</p>
                <div class="form-group">
                    <div class="form-label">
                        <label for="uname">Användarnamn<span class="req">*</span></label>
                    </div>
                    <div class="form-input">
                        <i class="fa-sharp fa-light fa-circle-user left"></i>
                        <input class="left-input" type="text" minlength="3" maxlength="20" name="username" id="uname" placeholder="Mystisk Användare" required>
                    </div>
                    
                </div>

                <div class="form-group">
                    <div class="form-label">
                        <label for="pword">Lösenord<span class="req">*</span></label>
                    </div>
                    <div class="form-input">
                        <i class="fa-sharp fa-light fa-key left"></i>
                        <input class="both-input" type="password" minlength="12" maxlength="250" name="password" id="pword" placeholder="Klurigt Lösenord" required>
                        <i class="fa-sharp fa-light fa-eye-slash right toggle-password"></i>
                    </div>
                </div>
            </div>
            <?php
                if(isset($_GET['error']) && $_GET['error'] == "login"){
                    echo "<p class='error'><i class='fa-sharp fa-light fa-circle-exclamation'></i> Fel användarnamn eller lösenord.</p>";
                }
            ?>
            <div class="form-btm">
                <button type="submit" class="no-border btn-CTA btn-animation">Logga in</button>
                <a href="registrerings-portal.php" class="btn-info btn-animation">Registrera</a>
            </div>
        </form>
    </section>

    <script src="/js/password-toggle-login.js"></script>
    <script src="/js/ping.js"></script>
</body>
<footer>
    <p id="version"></p>
    <script src="/js/version.js"></script>
</footer>

</html>