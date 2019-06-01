<?php
require './admin/libs/db_connect.php';
//Извлекаем ID пользователя, которого хотим отредактировать
$pageId = $_GET["id"];
$sql = "SELECT * FROM pages WHERE pageId = $pageId";
$result = $conn->query($sql);
$page = $result->fetch_assoc();
?>
<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php echo $page["title"] ?></title>
</head>
<body>
    <h1><?php echo $page["h1"] ?></h1>
    <div class="container">
        <?php echo $page["content"] ?>
    </div>
</body>
</html>