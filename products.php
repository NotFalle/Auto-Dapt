<?php

    // Hämta functions.php
    require_once "src/functions.php";

    // Spåra besökaren / uppdatera last_seen
    trackVisitor();

    // Standardvärden om användaren inte är inloggad
    $user = null;
    $profilePicture = "";
    $username = "";
    $role = "";

    // Om användaren är inloggad -> hämta användarens konto
    if (isLoggedIn()) {

        // Hämta användaren från databasen
        $user = getUserbyId($_SESSION["user_id"]);

        // Om användaren finns -> spara användarens information i variabler
        if ($user) {
            $profilePicture = $user["user-profile-picture"] ?? "";
            $username = $user["username"];
            $role = $user["role"];
        }
    }

    // Hämta alla kommentarer / reviews från databasen
    $comments = getComments();

?>

<!DOCTYPE html>
<html lang="sv">

<head>

    <!-- Sidans metadata, typsnitt och CSS -->
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
    <title>Produkter - Auto-Dapt</title>
</head>

<body>
    <!-- Navigation och produktbanner -->
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
                            <a href="contact.php" class="btn-animation">kontakt</a>
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
                    <?php
                        // Om inte session-variabel finns eller inte är TRUE
                        if (!isset($_SESSION['loggedIn']) || $_SESSION['loggedIn'] != TRUE) {
                            echo "<a href='src/portal/login-portal.php' tabindex='0'>Logga in</a>";
                        } else {
                            echo "<a href='/src/user/settings.php' tabindex='0'>Inställningar</i></a>";
                        }
                    ?>                </div>
            </div>
        </nav>
    
    
        <!-- Produktsidan -->
        <div id="product-page">

            <!-- Produktens huvudsektion -->
            <main id="product-page-main">

                <!-- Produktbilder -->
                <section class="product-preview">

                    <div class="selected-image">
                        <img src="img/auto-dapt-product.png" alt="Product Image">
                    </div>

                    <div id="moreimages-container">

                        <div class="moreimages active">
                            <img src="img/auto-dapt-product.png" alt="Product Image">
                        </div>

                        <div class="moreimages" id="moreimages-special-black">
                            <img src="img/auto-dapt-product-pink.png" alt="Product Image">
                        </div>

                        <div class="moreimages moreimages-special-white">
                            <img src="img/auto-dapt-product-blue.png" alt="Product Image">
                        </div>

                        <div class="moreimages moreimages-special-white">
                            <img src="img/auto-dapt-product-yellow.png" alt="Product Image">
                        </div>
                    </div>
                </section>
                <!-- Produktinformation -->
                <aside id="product-aside">
                    <h1 id="product-padge-h1">Auto-Dapt: Smart Adaptern för dig</h1>
                    <div id="rating">
                        <p><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><span id="rating-text">(4.9) 154 reviews</span></p>
                    </div>
                    <div id="product-price">
                        <h2 id="product-h2">49.99Kr</h2>
                        <span class="old-price">60Kr</span>
                        <span class="discount"><b>20% av</b></span>
                    </div>

                    <p class="product-description">Auto-Dapt gör dina vanliga enheter smarta på några sekunder. Styr lampor och elektronik direkt från mobilen med enkel installation och stabil uppkoppling. En smart och smidig lösning för ett modernare hem.</p>

                    <div id="product-buy-buttons">
                        <button id="shopping-cart-button"><i class="fa-utility fa-semibold fa-cart-shopping"></i>Lägg till i kundvagn</button>
                        <button id="buy-button">Köp nu!</button>
                    </div>
                </aside>

            </main>
            <!-- Produktens flikar: beskrivning, specifikationer och reviews -->
            <section id="product-bottom-section">

                <div id="product-selection-menu">
                    <button class="selection-choice active" data-key="description">Beskrivning</button>
                    <button class="selection-choice" data-key="specefications">Specifikationer</button>
                    <button class="selection-choice" data-key="reviews">Reviews</button>
                </div>

                <div class="bottom-content">
                    <div class="selection-content active" id="description">
                        <hr>
                        <h2>Auto-Dapt - Gör ditt hem smartare på sekunder</h2>
                        <p class="product-description-text">SmartAdapter är den enkla lösningen för att förvandla vanliga enheter till smarta produkter. Med modern teknik och smidig anslutning kan du styra lampor, elektronik och andra apparater direkt från mobilen – var du än befinner dig.</p>
                        <h2>Funktioner</h2>
                        <ul class="product-list">
                            <li>Enkel installation utan teknisk kunskap</li>
                            <li>Styr dina enheter via app eller röstassistent</li>
                            <li>Energieffektiv lösning som hjälper dig spara el</li>
                            <li>Kompatibel med smarta hem-system</li>
                            <li>Stabil och säker uppkoppling</li>
                        </ul>
                        <h2>Passar för</h2>
                        <ul class="product-list">
                            <li>Lampor</li>
                            <li>Fläktar</li>
                            <li>TV,datorer och annan elektronik</li>
                            <li>Med mycket mer</li>
                        </ul>
                    </div>

                    <div class="selection-content" id="specefications">
                        <hr>
                        <h2>Specifikationer - Auto-Dapt</h2>
                        <ul class="product-list">
                            <li>Strömförsörjning: 230V AC (standard vägguttag)</li>
                            <li>Kompatibilitet: Passar de flesta hushållsapparater med EU-kontakt</li>
                            <li>Anslutning: WiFi (2.4 GHz)</li>
                            <li>Styrning: Mobilapp (iOS & Android)</li>
                            <li>Användningsområde: Inomhus</li>
                        </ul>
                    </div>

                    <div class="selection-content" id="reviews">

                        <hr>

                        <div class="review-container">

                            <div class="messages-body">

                                <?php

                                    // Om användaren är inloggad -> visa formuläret för att skicka meddelande
                                    if (isLoggedIn()) {
                                        echo "
                                            <form action='src/auth/message.php' method='post'>

                                                <div class='message-hdr'>
                                                    <label for='msg'>Skicka ett meddelande:</label>
                                                </div>

                                                <div class='message-body'>

                                                    <input
                                                        type='text'
                                                        name='message'
                                                        id='msg'
                                                        maxlength='255'
                                                        required
                                                    >

                                                    <button type='submit' class='no-border icon-hover-button'>
                                                        <i
                                                            id='msg-btn'
                                                            class='fa-sharp fa-light fa-comment-arrow-up hover-icon'
                                                            data-normal='fa-comment-arrow-up'
                                                            data-hover='fa-comment-arrow-up-right'
                                                        ></i>
                                                    </button>

                                                </div>

                                            </form>
                                        ";
                                    } else {

                                        // Om användaren inte är inloggad -> visa endast information
                                        echo "
                                            <p class='product-description-text'>
                                                Logga in för att skicka ett meddelande.
                                            </p>
                                        ";
                                    }

                                ?>

                                <div class="messages-container">

                                    <?php

                                        // Om det finns kommentarer -> skriv ut dem
                                        if ($comments->num_rows > 0) {

                                            // Loopa igenom alla kommentarer
                                            while ($comment = $comments->fetch_assoc()) {

                                                // Spara kommentarens information i variabler
                                                $commentUsername = $comment["username"];
                                                $commentRole = $comment["role"];
                                                $commentMessage = $comment["message"];
                                                $commentProfilePicture = $comment["user-profile-picture"] ?? "";
                                                $commentTime = $comment["time-sent"];

                                                // Gör om tiden till timestamp
                                                $timestamp = strtotime($commentTime);

                                                // Formatera datum och tid
                                                $date = beutifyTimestamp($timestamp);
                                                $time = date("H:i", $timestamp);

                                                // Öppna meddelanderutan
                                                echo "
                                                    <div class='message'>

                                                        <div class='message-hdr'>
                                                ";

                                                // Om användaren har profilbild -> visa den
                                                if (!empty($commentProfilePicture)) {
                                                    echo "
                                                        <img
                                                            src='/src/image/uploads/" . htmlspecialchars($commentProfilePicture) . "'
                                                            id='pfpPreview'
                                                            alt='Profilbild'
                                                        >
                                                    ";
                                                } else {

                                                    // Annars -> visa standardikon
                                                    echo "
                                                        <div class='default-pfp' id='pfpPreview'>
                                                            <i class='fa-sharp fa-light fa-circle-user big-default-pfp'></i>
                                                        </div>
                                                    ";
                                                }

                                                // Öppna informationsdelen bredvid profilbilden
                                                echo "
                                                    <div class='message-hdr-desc'>
                                                ";

                                                // Visa användarnamn och roll med rätt CSS-klass
                                                if ($commentRole === "admin") {
                                                    echo "
                                                        <p>" . htmlspecialchars($commentUsername) . " <span class='admin'>(admin)</span></p>
                                                    ";
                                                } elseif ($commentRole === "user") {
                                                    echo "
                                                        <p>" . htmlspecialchars($commentUsername) . " <span class='member'>(medlem)</span></p>
                                                    ";
                                                } elseif ($commentRole === "og") {
                                                    echo "
                                                        <p>" . htmlspecialchars($commentUsername) . " <span class='og'>(OG)</span></p>
                                                    ";
                                                } else {
                                                    echo "
                                                        <p>" . htmlspecialchars($commentUsername) . "</p>
                                                    ";
                                                }

                                                // Skriv ut tid och datum
                                                echo "
                                                            <p class='small'>Skickat: " . htmlspecialchars($time) . "</p>
                                                        </div>

                                                        <div class='message-hdr-time'>
                                                            <p class='msg-right'>" . htmlspecialchars($date) . "</p>
                                                        </div>

                                                    </div>

                                                    <div class='message-content'>
                                                        <p>" . htmlspecialchars($commentMessage) . "</p>
                                                    </div>

                                                </div>
                                                ";
                                            }

                                        } else {

                                            // Om det inte finns några kommentarer -> visa text
                                            echo "
                                                <p class='product-description-text'>
                                                    Inga meddelanden har skickats ännu.
                                                </p>
                                            ";
                                        }

                                    ?>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </section>
    </div>
    
    <script src="js/icon-hover.js"></script>
    <script src="js/main.js"></script>
</body>

</html>