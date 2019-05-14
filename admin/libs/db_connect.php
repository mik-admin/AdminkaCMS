<?php
$servername = "localhost";
$username = "root";
$password_db = "";
$dbname = "miniadminka";

// Create connection
$conn = new mysqli($servername, $username, $password_db, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}