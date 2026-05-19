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
    <title>Information - Autodapt</title>
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
                            <a href="kontakt.php" class="btn-animation">Kontakta</a>
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
                            echo "<a href='src/portal/inloggningsportal.php' tabindex='0' class='portal-loggin-settings'>Logga in</a>";
                        } else {
                            echo "<a href='/src/user/installningar.php' tabindex='0' class='portal-loggin-settings'>Inställningar</i></a>";
                        }
                    ?>                </div>
            </div>
        </nav>
        <button class="back-btn" onclick="history.back()">Tillbaka</button>
        <div id="info-padge-contatiner">
            <h1 class="info-padge-h1">Produktbeskrivning</h1>
            <p class="info-padge-text">Produkten är en smart el-adapter som placeras mellan kontakt till elektrisk apparat och 230 volts vägguttaget. Adaptern ansluts till routern och styrs via mobilen i en app, detta gör det möjligt att automatisera och optimera elförbrukningen med hjälp av olika kategorier med drag-and-drop funktion för att byta kategori med schema enkelt. Den hierarkiska strukturen av kategorier finns där för att kunden enkelt ska kunna bygga olika scheman för olika kategorier som i sig kan bestämma över de underkategorier den innehåller. Kategoriernas scheman kan styras av externa funktioner som till exempelvis larm sensorer eller externa system som digitala kalendrar. När ett schema i till exempelvis en extern kalender uppdateras, så justeras strömförbrukningen automatiskt i realtid.</p>
            <h1 class="info-padge-h1">Funktionalitet</h1>
            <p class="info-padge-text">Adaptern kopplas in i nätverket via router och kan nås via appen i en mobil enhet. Kategorisystemet styr över adaptrar och underkategorier, det finns möjlighet att bygga strukturer för olika hus och enkelt byta vad en adapter ska följa för kategori med hjälp av drag-and-drop funktionen. Ett schema har tidsstyrning med automatiska uppdateringar från externa källor. Några exempel på externa källor skulle kunna vara: skolscheman, larmsystem och sensorer.
</p>
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