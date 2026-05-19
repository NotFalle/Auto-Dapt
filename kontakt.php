<?php
    require_once "src/functions.php";
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
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/fonts.css">
    <title>Kontakt - Autodapt</title>
</head>

<body>
    <section class="page-banner">
        <nav>
            <div class="nav-container">
           
                <div class="hdr-boxes">
                    <div id= "sidenav" class="sidenav">
                        <div id="sidenav-hdr">
                            <a href="javascript:void(0)" class="closebutton"
                            onclick="closeNav()">&times;</a>
                        </div>
                        <div id="sidenav-content">
                            <a href="index.php" class="btn-animation">Hem</a>
                            <a href="produkter.php" class="btn-animation">Produkter</a>
                        </div>
                    </div>
                    <button onclick="openNav()" tabindex="0" id="menu-btn" title="Öppna meny">
                        <i class="fa-notdog fa-solid fa-bars button-action menusize"></i>
                    </button>  
                </div>
                <div id="sidenav-overlay"></div> 

                 <div id="brand">
                    <h1 class="poppins-700">Auto-Dapt</h1>
                </div>
                <div class="hdr-boxes">
                    <?php
                        // Om inte session-variabel finns eller inte är TRUE
                        if (!isset($_SESSION['loggedIn']) || $_SESSION['loggedIn'] != TRUE) {
                            echo "<a href='src/portal/inloggningsportal.php' tabindex='0'class='portal-loggin-settings'>Logga in</a>";
                        } else {
                            echo "<a href='/src/user/installningar.php' tabindex='0' class='portal-loggin-settings'>Inställningar</i></a>";
                        }
                    ?>                </div>
            </div>
        </nav>
        <div id="contactpadge-container">
            <h1 id="contact-h1"class="poppins-800 text-primary-color">Använd Auto-Dapt idag och spara upp till 30% på el räkningen utan att lyfta ett finger!</h1>
            <p id="contact-info"class="text-primary-color">Har du frågor eller funderingar över våra smarta adaptrar? Tveka inte att gå in och läsa våra FAQ och har du några övriga frågor så finns vi tillägänliga via telefon <strong>9-17 </strong> på vardagar eller skicka ett majl och få svar inom <strong>48</strong> timmar</p>
            <div id="contact-container">
                <div class="contact-flexbox">
                    <h2>Våra kontakt uppgifter:</h2>
                    <button class="contact-button"><p class="contact-contactinfo text-primary-color"><b>Ring oss på: 46-70 123 45 67</b></p></button>
                     <button class="contact-button" onclick="location.href='https://mail.google.com/mail/u/0/#inbox?compose=GTvVlcSKjgCQbTSxKfVdHqRQGJCJbdMWvtvhcwpMdJLlfvlMKMBTqbCHLzlWQtTjRzxSgzmCwGbbg'"><p class="contact-contactinfo"class="text-primary-color"><b>Skirv mail till: Auto-Dapt@gmail.com</b></p></button>
                </div>
               
                <div class="contact-flexbox">
                    <h2>Intresserad av att sammarbeta?</h2>
                    <button class="contact-button" onclick="location.href='företag-kontaktsida.php'">
                        <p id="contact-button-text"class="text-primary-color"><b>Kontakt oss</b></p>
                    </button>
                </div>

                
            </div>

        </div>
           
        <div class="container">
            </div>    
             
    
    
        </div>
    </section>
    <script src="js/main.js"></script>

    <footer>
        <div class="footer">
        <h1>Auto-Dapt</h1>
        <span>Kontaktuppgifter:</span>
        </div>
        <div class="footer-information">
        <span>Gmail:</span><span>Auto-Dapt@gmail.com </span>
        <Span>Telefonnummer:</Span><span>07 123 45 67</span>
        </div>
    </footer>
</body>

</html>