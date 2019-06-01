<?php
require '../libs/db_connect.php';
$user_id = $_GET["user_id"];
$sql = "DELETE FROM users WHERE user_id = $user_id";
if ($conn->query($sql) === TRUE) {
    //Редирект с помощью PHP
    header('Location: http://localhost/phplesson/mini_site/admin/users.php');
    echo "<p>Пользователь удалён из базы</p>";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
?>

<p>
    <a href="/admin/users/users.php">Вернуться в админку</a>
</p>
<!--<script>-->
<!--    document.location.href="http://localhost/phplesson/mini_site/admin/users.php";-->
<!--</script>-->