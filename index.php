<?php
    session_start();
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
    <title>Auto-Dapt</title>
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
                            <a href="contact.php" class="btn-animation">Kontakta</a>
                            <a href="" class="btn-animation">Produkter</a>
                            <a href="" class="btn-animation">Forum</a>
                        </div>
                    </div>
                    <button onclick="openNav()" tabindex="0" id="menu-btn">
                        <i class="fa-notdog fa-solid fa-bars button-action menusize"></i>
                    </button>  
                </div>
                <div id="sidenav-overlay"></div>   
                
                <div id="brand">
                    <h1 class="poppins-700">Auto-Dapt</h1>
                </div>
                <div class="hdr-boxes">
                    <a href="login-portal.php" tabindex="0">Logga in <i class="fa-solid fa-circle-user"></i></a>
                </div>
            </div>
        </nav>

        <div class="container">
            <div class="container-middle">
                <div class="container-flexbox">
                    <div class="cnt-flex-left">
                        <h1 class="poppins-800 text-primary-color">Spara upp till 30% elektricitet!</h1>
                        <p class="text-primary-color">Vi siktar mot en energisnål framtid, en framtid utan energitjuvar. Vårt mål är att skapa lösningar för billigare energi och mindre miljöpåverkan.</p>
                        <div class="button-row">
                            <a class="btn-CTA btn-animation" href="products.php">Köp nu</a>
                            <a class="btn-info btn-animation" href="#">Så funkar det</a>
                        </div>
                    </div>
                    <div class="cnt-flex-right">
                        <img src="img/auto-dapt-product.png" alt="Product Image">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <a href="members.php">Till medlemssidorna</a>

    <section id="colorpalette">
        <div id="color1"></div>
        <div id="color2"></div>
        <div id="color3"></div>
        <div id="color4"></div>
    </section>

    <section id="sandbox">
        <div id="button1" class="nunito-400">Primary</div>
        <div id="button2" class="nunito-400">Secondary</div>
    </section>

    <a href="contact.php">Teleport</a> <!-- Temporary link -->

    <script src="js/main.js"></script>
</body>
<footer>
    <p id="version"></p>
    <script src="js/version.js"></script>
</footer>

</html>