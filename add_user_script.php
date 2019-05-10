<?php
$login = $_POST['login'];
$password = $_POST['password'];
$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$city = $_POST['city'];
require "db_connect.php";

$sql = "INSERT INTO users
VALUES (NULL, '$login', '$password', 0, '$last_name', '$first_name', '$city')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();

?>