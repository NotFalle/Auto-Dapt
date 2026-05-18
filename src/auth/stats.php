<?php

require_once __DIR__ . "/../functions.php";

header('Content-Type: application/json');

if (!isAdmin()) {
    http_response_code(403);
    echo json_encode(["error" => "not allowed"]);
    exit;
}

echo json_encode(getStats());

?>