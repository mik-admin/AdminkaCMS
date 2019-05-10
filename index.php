<?php
    session_start();
    require "lib.php";
?>
<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
    <?php
        require "menu.php";
        require "add_user_form.php";
        require "add_city_form.php";
        require "footer.php";
    ?>
</body>
</html>