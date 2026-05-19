<?php
    require_once "src/functions.php";
    trackVisitor();

    $user = null;
    $profilePicture = "";
    $username = "";
    $role = "";

    if (isLoggedIn()) {
        $user = getUserbyId($_SESSION["user_id"]);

        if ($user) {
            $profilePicture = $user["user-profile-picture"] ?? "";
            $username = $user["username"];
            $role = $user["role"];
        }
    }

    $comments = getComments();
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
    <title>Produkter - Auto-Dapt</title>
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
                            <a href="contact.php" class="btn-animation">kontakt</a>
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
    
    
    <div id="product-page">

        <main id="product-page-main">

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

            <?php if (isLoggedIn()): ?>

                <form action="src/auth/message.php" method="post">

                    <div class="message-hdr">
                        <label for="msg">Skicka ett meddelande:</label>
                    </div>

                    <div class="message-body">

                        <input
                            type="text"
                            name="message"
                            id="msg"
                            maxlength="255"
                            required
                        >

                        <button type="submit" class="no-border icon-hover-button">
                            <i
                                id="msg-btn"
                                class="fa-sharp fa-light fa-comment-arrow-up hover-icon"
                                data-normal="fa-comment-arrow-up"
                                data-hover="fa-comment-arrow-up-right"
                            ></i>
                        </button>

                    </div>

                </form>

            <?php else: ?>

                <p class="product-description-text">
                    Logga in för att skicka ett meddelande.
                </p>

            <?php endif; ?>

            <div class="messages-container">

                <?php if ($comments->num_rows > 0): ?>

                    <?php while ($comment = $comments->fetch_assoc()): ?>

                        <?php

                            $commentUsername = $comment["username"];
                            $commentRole = $comment["role"];
                            $commentMessage = $comment["message"];
                            $commentProfilePicture = $comment["user-profile-picture"] ?? "";

                            $commentTime = $comment["time-sent"];

                            $date = date("d-m-y", strtotime($commentTime));
                            $time = date("H:i", strtotime($commentTime));

                        ?>

                        <div class="message">

                            <div class="message-hdr">

                                <?php if (!empty($commentProfilePicture)): ?>

                                    <img
                                        src="/src/image/uploads/<?php echo htmlspecialchars($commentProfilePicture); ?>"
                                        id="pfpPreview"
                                        alt="Profilbild"
                                    >

                                <?php else: ?>

                                    <div class="default-pfp" id="pfpPreview">
                                        <i class="fa-sharp fa-light fa-circle-user big-default-pfp"></i>
                                    </div>

                                <?php endif; ?>

                                <div class="message-hdr-desc">

                                    <?php

                                        if ($commentRole === "admin") {

                                            echo "<p>" . htmlspecialchars($commentUsername) . " <span class='admin'>(admin)</span></p>";

                                        } elseif ($commentRole === "user") {

                                            echo "<p>" . htmlspecialchars($commentUsername) . " <span class='member'>(medlem)</span></p>";

                                        } elseif ($commentRole === "og") {

                                            echo "<p>" . htmlspecialchars($commentUsername) . " <span class='og'>(OG)</span></p>";

                                        } else {

                                            echo "<p>" . htmlspecialchars($commentUsername) . "</p>";

                                        }

                                        echo "<p class='small'>Skickat: " . htmlspecialchars($time) . "</p>";

                                    ?>

                                </div>

                                <div class="message-hdr-time">

                                    <?php
                                        echo "<p class='msg-right'>" . htmlspecialchars($date) . "</p>";
                                    ?>

                                </div>

                            </div>

                            <div class="message-content">

                                <p>
                                    <?php echo htmlspecialchars($commentMessage); ?>
                                </p>

                            </div>

                        </div>

                    <?php endwhile; ?>

                <?php else: ?>

                    <p class="product-description-text">
                        Inga meddelanden har skickats ännu.
                    </p>

                <?php endif; ?>

            </div>

        </div>

    </div>

</div>

            </div>

        </section>
  </div>
    
    <script src="js/icon-hover.js"></script>
    <script src="js/main.js"></script>
</body>

</html>