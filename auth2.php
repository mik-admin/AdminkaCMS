<?php
session_start();
if (isset($_POST["login"])) {
    $login = $_POST["login"];
    $password = $_POST["password"];
    require "db_connect.php";

    $sql = "SELECT * FROM users WHERE login='$login' and password='$password'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $_SESSION["login"]=$login;
        $_SESSION["auth"]=1;
        $_SESSION["counter"]=0;
    } else {
        echo "<p>Не найден пользователь</p>";
    }
    $conn->close();
}
?>

<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Авторизация</title>
</head>
<body>
<form action="auth2.php" method="post">
    Логин:<input type="text" name="login" required />
    Пароль:<input type="password" name="password" required />
    <input type="submit" value="Войти" />
</form>
</body>
</html>