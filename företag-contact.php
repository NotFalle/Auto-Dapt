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
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Företag-Kontakt</title>
    
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
                            <a href="products.php" class="btn-animation">Produkter</a>
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
        <button class="back-btn" onclick="history.back()">Tillbaka</button>
        <div id="company-contact-container">
            <div id="company-contact-box1">
                <h1 class="company-contact-h1" class="poppins-800 text-primary-color">Ny företagare? och letar efter en möjlighet att växa? Tveka inte på att kontakta oss! </h1>
                <p class="company-contact-text" class="text-primary-color">Ta möjligheten idag att vidareutveckla och modifiera våra adaptrar för att skapa exklusiva lösningar anpassade efter din marknad och dina kunder. Genom ett nära samarbete öppnas nya möjligheter för innovation, starkare varumärkespositionering och ett mer unikt erbjudande för dig som vill ligga steget före och bygga något med långsiktigt värde. </p>
                <h1 class="company-contact-h1" class="poppins-800 text-primary-colo">Villkor för samarbete</h1>
                <p class="company-contact-text" class="text-primary-color">Genom att inleda ett samarbete med oss godkänner du att följa våra gällande villkor, vilka är framtagna för att skapa en tydlig, trygg och långsiktig struktur för båda parter. Villkoren omfattar användning, vidareutveckling och eventuell modifiering av våra adaptrar och andra tekniska lösningar, och syftar till att säkerställa att alla anpassningar sker på ett sätt som bevarar kvalitet, funktionalitet och varumärkets integritet. Som företagare får du möjlighet att arbeta med våra produkter i syfte att utveckla unika och marknadsanpassade lösningar, men detta sker alltid inom ramen för de tekniska och juridiska riktlinjer som anges i avtalet. Detta innebär att varje form av förändring, anpassning eller vidareutveckling ska ske i samråd med oss för att säkerställa att slutresultatet uppfyller både säkerhetskrav och kvalitetsstandarder. Samarbetet bygger på en gemensam ambition om innovation och tillväxt, där båda parter bidrar med kompetens och resurser för att skapa konkurrenskraftiga lösningar på marknaden. Eventuella exklusiva anpassningar eller specialutvecklade produkter kan omfattas av särskilda överenskommelser som reglerar äganderätt, användningsrätt och distribution. Dessa avtal syftar till att tydliggöra ansvarsfördelning och säkerställa att båda parter kan dra nytta av samarbetet på ett hållbart och rättvist sätt. Vidare förväntas alla parter agera i enlighet med god affärssed, vilket inkluderar transparens, respekt för immateriella rättigheter och ett gemensamt fokus på långsiktigt värdeskapande. Genom att acceptera dessa villkor bekräftar du att du har tagit del av, förstått och godkänt samtliga delar av avtalet, samt att du åtar dig att följa de riktlinjer som gäller för samarbete, utveckling och användning av våra produkter. Detta partnerskap är utformat för att främja långsiktig stabilitet, innovation och ömsesidig nytta, där målet är att tillsammans skapa lösningar som inte bara möter dagens behov utan även framtidens krav på kvalitet, flexibilitet och teknisk utveckling.</p>            
                <h1 class="company-contact-h1" class="poppins-800 text-primary-color">Vi ser fram emot att sammarbeta med dig :)</h1>

            </div>

            <div id="company-contact-box2">
                 <form id="contact-form">
                     <h1 id="company-contact-h1" class="poppins-800 text-primary-color">Kontakta oss!</h1>

                        <div class="form-group">
                            <label class="contact-label">Förnamn <span class="contact-span">*</span></label>
                            <input class="contact-input" type="text" required>
                        </div>

                    <div class="form-group">
                        <label class="contact-label">Efternamn <span class="contact-span">*</span></label>
                        <input class="contact-input" type="text" required>
                    </div>

                    <div class="form-group">
                        <label class="contact-label">Email <span class="contact-span">*</span></label>
                        <input class="contact-input" type="email" required>
                    </div>

                    <div class="form-group">
                        <label class="contact-label">Företag <span class="contact-span">*</span></label>
                        <input class="contact-input" type="text" required>
                    </div>

                    <div class="form-group">
                        <label class="contact-label">Mobiltelefon <span class="contact-span">*</span></label> 
                        <input class="contact-input" type="tel" required placeholder="+46-70 123 45 67">
                    </div>

                    <div class="form-group">
                        <label class="contact-label">Vad kan vi hjälpa dig med? <span class="contact-span">*</span></label>
                        <textarea id="contact-writingspace" placeholder="Skriv ditt meddelande här"></textarea>
                    </div>

                    <div class="checkbox">
                        <input id="checkbox-input" type="checkbox" required>
                        <label id="checkbox-label">Jag accepterar villkoren <span class="contact-span" >*</span></label>
                    </div>

                    <div class="captcha">
                        <input id="captcha-box" type="checkbox" required>
                        <p class="poppins-700" id="captcha-text">Jag är inte en robot</p>
                    </div>
                    <button id="submit" type="submit">Skicka</button>
                </form>
            </div>
        </div>
    </section>
    <script src="js/main.js"></script>
</body>
</html>