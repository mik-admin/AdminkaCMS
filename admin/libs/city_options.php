<?php

require "db_connect.php";

$sql = "SELECT name FROM cities";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<option value='". $row['name'] ."'>" . $row['name'] . "</option>";
    }
} else {
    echo "0 results";
}

$conn->close();
