<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Пользователи</title>
    <link rel="stylesheet" href="admin.css"/>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css"
          integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
</head>
<body>

<?php
require '../db_connect.php';
$sql = "SELECT * FROM users";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
?>

<div class="modal-fon"></div>

<div id="modalbox" class="modal-card">
    <i class="fa fa-times" class="modal-close" aria-hidden="true"></i>
    <div class="modal-window">
        <h2>Подтвердите удаление</h2>
        <a href="" id="deleteLink" class="delete">Удалить</a>
    </div>
</div>
<table class="users_table">
    <tr>
        <th>ID</th>
        <th>Login</th>
        <th>Balance</th>
        <th>City</th>
        <th>Фамилия</th>
        <th>Имя</th>
        <th>Отчество</th>
        <th>Настройки</th>
    </tr>

    <?php
    while ($row = $result->fetch_assoc()) {
        $user_id = $row["user_id"];
        echo "<tr>";
        echo "<td>" . $row["user_id"] . "</td>";
        echo "<td>" . $row["login"] . "</td>";
        echo "<td>" . $row["balance"] . "</td>";
        echo "<td>" . $row["city"] . "</td>";
        echo "<td>" . $row["last_name"] . "</td>";
        echo "<td>" . $row["first_name"] . "</td>";
        echo "<td>" . $row["middle_name"] . "</td>";

        echo "<td>" . "<a href='user_edit.php?user_id=$user_id'>Редактировать</a>" .
            "<span id='$user_id' href='#modalbox' class='modal-open'><i class='fa fa-times' aria-hidden='true' style='color: #000;'></i></span>" .
            "</td>";

        echo '<td class="hidden">' .
            '<a href="user_remove.php?user_id=' . $user_id . '" class="delete"><span><i class="fa fa-times" aria-hidden="true"></i></span></a>' . "</td>";
        echo "</tr>";
    }
    } else {
        echo "0 results";
    }
    ?>
</table>

<?php
$conn->close();
?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
<script src="js/admin.js"></script>
<script src="js/modalBox.js"></script>

</body>
</html>