<?php

    // Laddar in functions.php
    require_once __DIR__ . "/../functions.php";

    // Om användaren inte är inloggad skickas den till startsidan
    if (!isLoggedIn()) {
        header("Location: /index.php");
        exit;
    }

    // Hämtar användarens id från sessionen
    $userId = $_SESSION["user_id"];

    // Hämtar och rensar användarnamn och e-post från formuläret
    $username = trim($_POST["username"] ?? "");
    $email = trim($_POST["email"] ?? "");

    // Hämtar eventuell beskuren profilbild från formuläret
    $croppedImage = $_POST["croppedImage"] ?? "";

    // Om användarnamn eller e-post är tomt skickas användaren tillbaka med felmeddelande
    if ($username === "" || $email === "") {
        header("Location: /src/user/settings.php?error=" . rawurlencode("Användarnamn och e-post får inte vara tomma."));
        exit;
    }

    // Skapar en databasuppkoppling
    $db = connectToDb();

    // Hämtar nuvarande användare från databasen
    $user = getUserbyId($userId);

    // Hämtar den gamla profilbilden om användaren har en
    $oldImage = $user["user-profile-picture"] ?? null;

    // Sätter filnamnet till den gamla bilden som standard
    $fileName = $oldImage;

    // Skapar SQL-fråga för att kontrollera om användarnamnet redan används av någon annan
    $query = "
        SELECT user_id
        FROM `autodapt-userdatabase`
        WHERE username = ?
        AND user_id != ?
        LIMIT 1
    ";

    // Förbereder SQL-frågan
    $stmt = $db->prepare($query);

    // Binder värden till frågan
    $stmt->bind_param("si", $username, $userId);

    // Skickar SQL-frågan
    $stmt->execute();

    // Hämtar resultatet
    $result = $stmt->get_result();

    // Om användarnamnet redan finns skickas användaren tillbaka med felmeddelande
    if ($result->num_rows > 0) {
        header("Location: /src/user/settings.php?error=" . rawurlencode("Användarnamnet används redan."));
        exit;
    }

    // Stänger statement
    $stmt->close();

    // Skapar SQL-fråga för att kontrollera om e-postadressen redan används av någon annan
    $query = "
        SELECT user_id
        FROM `autodapt-userdatabase`
        WHERE email = ?
        AND user_id != ?
        LIMIT 1
    ";

    // Förbereder SQL-frågan
    $stmt = $db->prepare($query);

    // Binder värden till frågan
    $stmt->bind_param("si", $email, $userId);

    // Skickar SQL-frågan
    $stmt->execute();

    // Hämtar resultatet
    $result = $stmt->get_result();

    // Om e-postadressen redan finns skickas användaren tillbaka med felmeddelande
    if ($result->num_rows > 0) {
        header("Location: /src/user/settings.php?error=" . rawurlencode("E-postadressen används redan."));
        exit;
    }

    // Stänger statement
    $stmt->close();

    // Sparar om en ny bild har laddats upp eller inte
    $newImageUploaded = false;

    // Om en ny profilbild har skickats med formuläret
    if (!empty($croppedImage)) {

        // Tar bort base64-headern från bilden
        $image = str_replace("data:image/webp;base64,", "", $croppedImage);

        // Ersätter mellanslag med plus-tecken
        $image = str_replace(" ", "+", $image);

        // Gör om base64-texten till bilddata
        $data = base64_decode($image);

        // Om bilden inte kunde läsas skickas användaren tillbaka med felmeddelande
        if ($data === false) {
            header("Location: /src/user/settings.php?error=" . rawurlencode("Profilbilden kunde inte läsas."));
            exit;
        }

        // Sätter sökvägen till uploads-mappen
        $uploadDir = __DIR__ . "/uploads/";

        // Skapar uploads-mappen om den inte redan finns
        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0755, true);
        }

        // Skapar ett unikt filnamn för den nya profilbilden
        $fileName = uniqid("profile_", true) . ".webp";

        // Skapar hela filsökvägen
        $filePath = $uploadDir . $fileName;

        // Sparar den nya bilden i uploads-mappen
        if (file_put_contents($filePath, $data) === false) {
            header("Location: /src/user/settings.php?error=" . rawurlencode("Profilbilden kunde inte sparas."));
            exit;
        }

        // Markerar att en ny bild har laddats upp
        $newImageUploaded = true;
    }

    // Skapar SQL-fråga för att uppdatera kontouppgifterna
    $query = "
        UPDATE `autodapt-userdatabase`
        SET 
            username = ?,
            email = ?,
            `user-profile-picture` = ?
        WHERE `user_id` = ?
    ";

    // Förbereder SQL-frågan
    $stmt = $db->prepare($query);

    // Binder värden till frågan
    $stmt->bind_param(
        "sssi",
        $username,
        $email,
        $fileName,
        $userId
    );

    // Uppdaterar användaren i databasen
    $stmt->execute();

    // Stänger statement och databasuppkoppling
    $stmt->close();
    $db->close();

    // Om en ny bild laddades upp tas den gamla profilbilden bort
    if ($newImageUploaded && !empty($oldImage) && $oldImage !== $fileName) {
        $oldPath = __DIR__ . "/uploads/" . $oldImage;

        // Tar bort gamla bilden om filen finns
        if (file_exists($oldPath)) {
            unlink($oldPath);
        }
    }

    // Uppdaterar användarnamnet i sessionen
    $_SESSION["username"] = $username;

    // Skickar tillbaka användaren till settings.php med success-meddelande
    header("Location: /src/user/settings.php?success=" . rawurlencode("Kontouppgifterna sparades."));
    exit;

?>