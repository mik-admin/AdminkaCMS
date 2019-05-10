<?php
require '../db_connect.php';
if (isset($_POST["login"])) {
    $user_id = $_POST["user_id"];
    $login = $_POST["login"];
    $password = $_POST["password"];
    $balance = $_POST["balance"];
    $city = $_POST["city"];
    $last_name = $_POST["last_name"];
    $first_name = $_POST["first_name"];
    $middle_name = $_POST["middle_name"];
    $sql = "UPDATE USERS SET login = '$login', password = '$password', balance = $balance,
city = '$city', last_name = '$last_name', first_name = '$first_name', middle_name = '$middle_name' WHERE user_id = $user_id";
    if ($conn->query($sql) === TRUE) {
        echo "<p>Данные пользователя обновлены</p>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
//Извлекаем ID пользователя, которого хотим отредактировать
$user_id = $_GET["user_id"];
$sql = "SELECT * FROM users WHERE user_id = $user_id";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
?>

<form action="#" method="post">
    <input type="hidden" name="user_id" value="<?php echo $row["user_id"]; ?>"/>
    <input type="text" name="login" value="<?php echo $row["login"]; ?>"/>
    <input type="password" name="password" value="<?php echo $row["password"]; ?>"/>
    <input type="text" name="balance" value="<?php echo $row["balance"]; ?>"/>
    <input type="text" name="city" value="<?php echo $row["city"]; ?>"/>
    <input type="text" name="last_name" value="<?php echo $row["last_name"]; ?>"/>
    <input type="text" name="first_name" value="<?php echo $row["first_name"]; ?>"/>
    <input type="text" name="middle_name" value="<?php echo $row["middle_name"]; ?>"/>
    <input type="submit" value="Изменить данные"/>
</form>