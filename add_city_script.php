<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
<?php
$city = $_POST['city'];
require "db_connect.php";

$sql = "INSERT INTO cities VALUES (NULL, '$city')";

require "db_connect_2.php";
?>
</body>
</html>