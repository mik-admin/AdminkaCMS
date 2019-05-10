<?php
session_start();

// проверка на вход
if (isset($_POST["login"])) {
    $_SESSION["login"]=$_POST["login"];
}
?>
<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Авторизация Простая</title>
</head>
<body>
<?php
    require "inc/showLogin.php";
?>
<form action="#" method="post">
    <input type="text" name="login"/>
    <input type="submit" value="Войти"/>
</form>
</body>
</html>