<?php
// Database configuration
$db_host = "localhost";
$db_username = "root";
$db_password = ""; // XAMPP default password is an empty string
$db_name = "company_db";

// Create MySQL connection using mysqli
$conn = new mysqli($db_host, $db_username, $db_password, $db_name);

// Check connection for any errors
if ($conn->connect_error) {
    die("Database Connection failed: " . $conn->connect_error);
}

// Optional: Set the character set to ensure proper encoding (e.g., for specialized characters or emojis)
$conn->set_charset("utf8mb4");

// Note: Ensure you include this file at the top of your other PHP scripts using:
// require_once 'config.php';
?>
