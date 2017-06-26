<?php
defined("CATALOG") or die("Access denied");

//авторизация
function authorization()
{

    global $connection;
    $login = trim(mysqli_real_escape_string($connection, $_POST['login']));
    $password = trim($_POST['password']);
    if (empty($login) OR empty($password)) {
        $_SESSION['error'] = "Заполните поле";
    } else {
        $password = md5($password);
        $query = "SELECT name, is_admin FROM users WHERE login='$login' AND password='$password' LIMIT 1";
        $res = mysqli_query($connection, $query);
        if (mysqli_num_rows($res) == 1) {
            $row = mysqli_fetch_assoc($res);
            $_SESSION['auth']['user'] = $row['name'];
            $_SESSION['auth']['is_admin'] = $row['is_admin'];
            $_SESSION['success'] = "Вход выполнен";
        } else {
            $_SESSION['error'] = "Неверный логин или пароль";
        }
    }
}