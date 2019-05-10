<h2>Регистрация</h2>
<form action="add_user_script.php" method="POST">
    <input type="text" placeholder="Логин" name="login" />
    <input type="password" placeholder="Пароль" name="password" />
    <input type="text" placeholder="Имя" name="first_name" />
    <input type="text" placeholder="Фамилия" name="last_name" />
    <!-- todo: сделать подгрузку городов из БД -->
    <select name="city">
        <?php
            require "city_options.php";
        ?>
    </select>
    <input type="submit" value="Зарегестрироваться" />
</form>