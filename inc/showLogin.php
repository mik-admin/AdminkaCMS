<?php
if (isset($_SESSION["login"]) && isset($_SESSION["auth"])) {
    echo "<p>Ваш логин: " . $_SESSION["login"] . " Обзор страниц: " . $_SESSION["counter"] . "</p>";
    $_SESSION["counter"]++;
} else {
    echo "<p>Вы не авторизованы</p>";
}