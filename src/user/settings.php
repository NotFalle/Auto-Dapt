<?php
    require_once __DIR__ . "/../functions.php";
    trackVisitor();
    
    if (!isLoggedIn()) {
        header("Location: /index.php");
        exit;
    }

    $user = getUserbyId($_SESSION["user_id"]);

    if (!$user) {
        header("Location: /index.php");
        exit;
    }

    $profilePicture = $user["user-profile-picture"] ?? "";
    $username = $user["username"];
    $created = date("d-m-Y", strtotime($user["created_at"]));
    $email = $user["email"];
    $role = $user["role"];


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

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.6.2/cropper.min.css"/>

    <!-- Load CSS files and set title -->
    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="/css/fonts.css">

    <title>Inställningar - <?php echo $_SESSION['username'];?></title>
</head>
<body>
    <section class="form-nav">
        <a href="/index.php" class="btn-info form-nav-btn btn-animation">Tillbaka</a>
    </section>
    <section class="settings">
        <div class="settings-container">
            <div class="settings-hdr">
                <h1 class="poppins-700">Inställningar</h1>
            </div>
            <form action="/src/image/upload.php" method="post" class="settings-body">
                <div class="settings-flexbox">
                    <label for="pfpInput" class="settings-pfp" id="pfpDropzone">
                        <?php

                            if (!empty($profilePicture)) {
                                echo "
                                    <img
                                        src='/src/image/uploads/" . htmlspecialchars($profilePicture) . "'
                                        id='pfpPreview'
                                        alt='Profilbild'
                                    >
                                ";
                            } else {
                                echo "
                                    <div class='default-pfp' id='pfpPreview'>
                                        <i class='fa-sharp fa-light fa-circle-user big-default-pfp'></i>
                                    </div>
                                ";
                            }

                        ?>
                    </label>

                    <input
                        type="file"
                        id="pfpInput"
                        accept="image/*"
                        hidden
                    >

                    <input
                        type="hidden"
                        name="croppedImage"
                        id="croppedImage"
                    >

                    <div class="settings-pfp-desc">
                        <?php

                            echo "
                                <div class='form-label'>
                                    <label for='uname'>Användarnamn<span class='req'></label>
                                </div>
                                <div class='form-input'>
                                    <i class='fa-sharp fa-light fa-circle-user left'></i>
                                    <input class='both-input' type='text' minlength='3' maxlength='20' name='username' id='uname' placeholder='" . $username . "' value='" . $username . "' required>
                                    <i class='fa-sharp fa-light fa-pen-to-square right'></i>
                                </div>

                            ";

                            echo "
                                <div class='form-label'>
                                    <label for='email'>E-post adress<span class='req'></label>
                                </div>
                                <div class='form-input'>
                                    <i class='fa-sharp fa-light fa-envelope left'></i>
                                    <input class='both-input' type='email' name='email' id='mail' placeholder='" . $email . "' value='" . $email . "' required>
                                    <i class='fa-sharp fa-light fa-pen-to-square right'></i>
                                </div>

                            ";

                        ?>
                    </div>
                </div>
                <?php

                    if ($role == "admin") {

                        echo "<i class='settings-status'>Du är <i class='admin'>admin</i> och ditt konto skapades: " . $created . "</i>";
                        echo "<div class='settings-btm'><a href='/src/admin/admin-panel.php' class='btn-panel btn-animation'>Gå till admin panelen</a></div>";

                    } elseif ($role == "user") {
                        
                        echo "<i class='settings-status'>Du har ett <i class='user'>användarkonto</i> och ditt konto skapades: " . $created . "</i>";

                    } else {

                        header("/index.html");

                    }

                ?>
                <p>Klicka på profilbilden för att redigera profilbild, fyll i uppgifter och glöm inte att spara efter att ha redigerat dina kontouppgifter.</p>
                <?php
                    if (isset($_GET["error"])) {

                        echo "
                            <p class='error'>
                                " . htmlspecialchars($_GET["error"]) . "
                            </p>
                        ";

                    } elseif (isset($_GET["success"])) {

                        echo "
                            <p id='successMessage' class='done'>
                                " . htmlspecialchars($_GET["success"]) . "
                            </p>
                        ";
                    }
                ?>
                <div class="settings-btm">
                    <button type="submit" class="no-border btn-CTA btn-animation">Spara kontouppgifter</button>
                    <a href="/src/auth/logout.php" class="btn-logout btn-animation">Logga ut</a>
                </div>
            </form>
        </div>
    </section>

    <div id="cropModal" class="settings-modal">

        <div class="settings-modal-content">

            <img
                id="cropImage"
                class="settings-crop-image"
            >

            <div class="settings-crop-buttons">

                <button
                    type="button"
                    id="cropOk"
                    class="zero-mrg btn-CTA hover-animation"
                >
                    OK
                </button>

                <button
                    type="button"
                    id="cropCancel"
                    class="zero-mrg btn-info hover-animation"
                >
                    Avbryt
                </button>

            </div>

        </div>

    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.6.2/cropper.min.js"></script>
    <script src="/js/settings.js"></script>
</body>
</html>