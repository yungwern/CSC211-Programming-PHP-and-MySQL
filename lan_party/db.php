<?php
// db.php - Database connection file
// This file is included on every page that needs database acces
// Requirement: Use of the include() directive

$host = "localhost";
$dbname = "lan_party";
$username = "root";
$password = "";

// Create connection using mysqli
$conn = mysqli_connect($host, $username, $password, $dbname);

// Check if connection was successful
if(!$conn){
    die("Connection failed: " . mysqli_connect_error());
}
?>