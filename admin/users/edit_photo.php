<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Редактирование фото</title>
</head>
<body>
<h1>Редактирование фото</h1>
<form action="edit_photo.php" method="POST" enctype="multipart/form-data">
    <input type="file" name="userPhoto"/>
    <input type="hidden" name="user_id" value="<?php echo $_GET["user_id"]; ?>">
    <input type="submit" name="submit" value="Изменить">
</form>
<?php
if (isset($_POST["submit"])) {
    $user_id = $_POST["user_id"];
    $photo = $_FILES["userPhoto"]["name"];
    require "./libs/db_connect.php";
    $sql = "UPDATE users SET photo = '$photo' WHERE user_id = $user_id";
    if ($conn->query($sql) === TRUE) {
        header('Location: http://localhost/phplesson/mini_site/admin/users.php');
        echo "<p>Фото обновлено</p>";
    } else {
        echo "Ошибка: " . $sql . "<br>" . $conn->error;
    }
    $target_dir = "photos/";
    $target_file = $target_dir . basename($_FILES["userPhoto"]["name"]);
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    $check = getimagesize($_FILES["userPhoto"]["tmp_name"]);
    if ($check !== false) {
        echo "Файл является картинкой, формат: - " . $check["mime"] . ".";
    } else {
        echo "Файл не является картнкой.";
    }
    if (move_uploaded_file($_FILES["userPhoto"]["tmp_name"], $target_file)) {
        echo "Файл " . basename($_FILES["userPhoto"]["name"]) . " успешно сохранён.";
    } else {
        echo "Что-то пошло не так.";
    }
} else {
    echo "test";
}
?>
</body>
</html>