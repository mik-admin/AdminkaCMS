<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <script src="https://cloud.tinymce.com/5/tinymce.min.js"></script>
    <script>tinymce.init({selector: '#tinyMCE'});</script>
</head>
<body>
<?php
require '../libs/db_connect.php';
if (isset($_POST["title"])) {
    $pageId = $_POST["pageId"];
    $title = $_POST["title"];
    $h1 = $_POST["h1"];
    $description = $_POST["description"];
    $content = $_POST["content"];
    $sql = "UPDATE pages SET title = '$title ', h1 = '$h1', description = '$description', content = '$content' WHERE pageId = $pageId";
    if ($conn->query($sql) === TRUE) {
        echo "<p>Данные пользователя обновлены</p>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
//Извлекаем ID пользователя, которого хотим отредактировать
$pageId = $_GET["pageId"];
$sql = "SELECT * FROM pages WHERE pageId = $pageId";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
?>

<form action="#" method="post">
    <input type="hidden" name="pageId" value="<?php echo $row["pageId"]; ?>"/>
    <input type="text" name="title" value="<?php echo $row["title"]; ?>"/>
    <input type="text" name="h1" value="<?php echo $row["h1"]; ?>"/>
    <textarea name="description" placeholder="Введите Description">
        <?php echo $row["description"]; ?>
    </textarea>
    <textarea name="content" id="tinyMCE" placeholder="Введите Content">
        <?php echo $row["content"]; ?>
    </textarea>
    <input type="submit" value="Изменить данные"/>
</form>
</body>
</html>