<?php
$dbhost = "localhost";
$dbuser = "root";
$password = "";
$dbname = "loginsystem";

// Connect
$conn = mysqli_connect($dbhost, $dbuser, $password, $dbname);

// Check connection
if (!$conn) {
    die("Database connection failed: " . mysqli_connect_error());
}
?>
