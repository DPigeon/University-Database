<?php
// Connection information
$servername = "krc353.encs.concordia.ca";
$username = "krc353_1";
$password = "cncrd353";
$database = "krc353_1";

// Connection defined as global, so simply include the file and start using it for queries !
global $conn;
$conn = new mysqli($servername, $username, $password, $database);

// Verify connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
?>