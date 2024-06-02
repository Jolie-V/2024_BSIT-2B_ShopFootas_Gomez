<?php

$db_host = 'localhost';
$db_name = 'shopfootas.db';
$db_user = 'root';
$db_password = '';

// Constructing DSN
$dsn = "mysql:host=$db_host;dbname=$db_name";

try {
    // Establishing connection
    $conn = new PDO($dsn, $db_user, $db_password);
    // Setting PDO attributes
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // Other database operations...
} catch (PDOException $e) {
    // Error handling
    echo "Connection failed: " . $e->getMessage();
    exit(); // Terminate script execution
}

?>
