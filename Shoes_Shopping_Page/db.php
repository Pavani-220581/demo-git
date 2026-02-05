<?php
// Global variables (required by lab)
$host = "localhost";
$user = "root";
$pass = "";
$dbname = "userdb";

// Create connection
$conn = mysqli_connect($host, $user, $pass, $dbname);

// Check connection
if (!$conn) {
    die("Database Connection Failed: " . mysqli_connect_error());
}
?>
