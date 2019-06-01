<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title></title>
</head>
<body>

<?php
require '../libs/db_connect.php';
$sql = "SELECT * FROM menu, pages WHERE menu.pageId = pages.pageId";
$result = $conn->query($sql);
?>

<?php require '../adminMenu.php' ?>

<table style="border: 2px solid #000;">
    <thead>
    <tr>
        <th>Заголовок</th>
        <th>Страница</th>
        <th>Порядок</th>
    </tr>
    </thead>
    <tbody>
    <?php
    // выводим все пункты меню
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["name"] . "</td>";
        echo "<td>" . $row["title"] . "</td>";
        echo "<td>" . $row["the_order"] . "</td>";


    }
    ?>
    </tbody>
</table>
<form action="#" method="POST">
    <input type="text" name="name" placeholder="Имя">
    <select name="pageId">
        <?php require "page_list.php"; ?>
    </select>
    <input type="text" name="the_order" placeholder="Приоритет">
    <input type="submit" value="Создать">
</form>
<?php
if (isset($_POST['name'])) {
    $name = $_POST['name'];
    $pageId = $_POST['pageId'];
    $the_order = $_POST['the_order'];
    require "../libs/db_connect.php";
    $sql = "INSERT INTO menu VALUES (NULL, '$name', '$pageId', 0, 0, $the_order)";

    if ($conn->query($sql) === TRUE) {
        echo "Добавлен новый пункт меню! ";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}


?>

</body>
</html>