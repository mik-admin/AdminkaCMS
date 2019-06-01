<?php
$login = $_POST['login'];
$password = $_POST['password'];
$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$middle_name = $_POST['middle_name'];
$city = $_POST['city'];
$photo = $_FILES["userPhoto"]["name"];
require "../libs/db_connect.php";
$sql = "INSERT INTO users
VALUES (NULL, '$login', '$password', 0, '$last_name', '$first_name', '$middle_name', '$city', '$photo')";

if ($conn->query($sql) === TRUE) {
    echo "Добавлен новый пользователь! ";
    echo "<a href='users.php'>Перейти к пользователям</a>";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

//Сохранение фото пользователя
$target_dir = "photos/";
$target_file = $target_dir . basename($_FILES["userPhoto"]["name"]);
$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
$check = getimagesize($_FILES["userPhoto"]["tmp_name"]);
if ($check !== false) {
    echo "Файл является картинкой, формат: - " . $check["mime"] . ".";
} else {
    echo "Файл не является картнкой.";
}
//Сохранение изображения
if (move_uploaded_file($_FILES["userPhoto"]["tmp_name"], $target_file)) {
    echo "Файл " . basename($_FILES["userPhoto"]["name"]) . " успешно сохранён.";
} else {
    echo "Что-то пошло не так.";
}

$conn->close();

?>