<?php

require "../libs/db_connect.php";

$sql = "SELECT title, pageId FROM pages";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<option value='". $row['pageId'] ."'>" . $row['title'] . "</option>";
    }
} else {
    echo "0 results";
}

$conn->close();
