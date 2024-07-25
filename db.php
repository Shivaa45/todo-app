<?php
require 'vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

$servername = $_ENV['DB_HOST'];
$username = $_ENV['DB_USERNAME'];
$password = $_ENV['DB_PASSWORD'];
$dbname = $_ENV['DB_DATABASE'];

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create table if it does not exist
$tableCheckQuery = "SHOW TABLES LIKE 'todos'";
$result = $conn->query($tableCheckQuery);

if ($result->num_rows == 0) {
    $createTableQuery = "CREATE TABLE todos (
        id INT AUTO_INCREMENT PRIMARY KEY,
        title VARCHAR(255) NOT NULL,
        completed BOOLEAN NOT NULL DEFAULT 0
    )";
    
    if ($conn->query($createTableQuery) === TRUE) {
        echo "Table 'todos' created successfully.";
    } else {
        die("Error creating table: " . $conn->error);
    }
}

?>
