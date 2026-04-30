<?php
include('../config/connection.php');

/* ---------------- SECURITY HEADERS ---------------- */

header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET");
header("Access-Control-Allow-Headers: Content-Type, Authorization");

header("X-Content-Type-Options: nosniff");
header("X-Frame-Options: DENY");
header("X-XSS-Protection: 1; mode=block");

/* ---------------- REQUEST LOG ---------------- */

// Log file path
$log_file = __DIR__ . '/test.log';

// Collect request data
$log_data = [
    "time"       => date("Y-m-d H:i:s"),
    "ip"         => $_SERVER['REMOTE_ADDR'] ?? '',
    "method"     => $_SERVER['REQUEST_METHOD'],
    "url"        => $_SERVER['REQUEST_URI'],
    "headers"    => getallheaders(),
    "get_data"   => $_GET,
    "post_data"  => $_POST
];

// Convert to string
$log_entry = json_encode($log_data, JSON_PRETTY_PRINT) . "\n------------------------\n";

// Save to file
file_put_contents($log_file, $log_entry, FILE_APPEND);


/* ---------------- AUTH CHECK (API KEY) ---------------- */

$headers = getallheaders();
$api_key = "your_secure_api_key_here";

if (!isset($headers['Authorization']) || $headers['Authorization'] !== "Bearer $api_key") {
    echo json_encode([
        "status" => false,
        "message" => "Unauthorized access"
    ]);
    exit();
}

/* ---------------- METHOD CHECK ---------------- */

if ($_SERVER['REQUEST_METHOD'] !== 'GET') {
    echo json_encode([
        "status" => false,
        "message" => "Invalid request method"
    ]);
    exit();
}

/* ---------------- FETCH USERS ---------------- */

$sql = "SELECT * FROM user WHERE 1";
$result = mysqli_query($conn, $sql);

$users = [];

while ($row = mysqli_fetch_assoc($result)) {
    $users[] = $row;
}

echo json_encode([
    "status" => true,
    "data" => $users
]);

mysqli_close($conn);
?>