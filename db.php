<?php
$host = "127.0.0.1";
$username = "root"; // or your MySQL username
$password = ""; // 🔁 replace this with your real password
$database = "devblog";
$port = 3307; // explicitly specify the port if needed

$conn = new mysqli($host, $username, $password, $database, $port);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
