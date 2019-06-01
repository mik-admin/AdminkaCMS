<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Создание новой страницы</title>
    <script src="https://cloud.tinymce.com/5/tinymce.min.js"></script>
    <script>tinymce.init({selector: '#tinyMCE'});</script>
</head>
<body>
<h1>Создание новой страницы</h1>
<form action="#" method="post">
    <input type="text" placeholder="Введите Title" name="title">
    <input type="text" placeholder="Введите Description" name="description">
    <input type="text" placeholder="Введите h1" name="h1">
    <textarea name="content" id="tinyMCE" placeholder="Введите Content"></textarea>
    <input type="submit" value="Создать" name="submit">
</form>
</body>
</html>
<?php if (isset($_POST['submit'])) {
    $title = $_POST['title'];
    $description = $_POST['description'];
    $h1 = $_POST['h1'];
    $content = $_POST['content'];

    require '../libs/db_connect.php';
    $sql = "INSERT INTO pages
VALUES (NULL, '$title', '$h1', '$description', '$content')";

    if ($conn->query($sql) === TRUE) {
        echo "Добавлена новая страница! ";
        echo "<a href='page.php'>Перейти ко всем страницам</a>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
} ?>