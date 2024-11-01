<?php
$host = "localhost";          // MySQL server host
$username = "root";  // MySQL username
$password = "";  // MySQL password
$database = "vuejs";  // Database name

// Create a MySQLi connection
$conn = mysqli_connect($host, $username, $password, $database);

// Check the connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}



?>
