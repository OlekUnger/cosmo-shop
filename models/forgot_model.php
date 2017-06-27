<?php
defined("CATALOG") or die("Access denied");

//начало восстановления пароля
function forgot()
{
    global $connection;
    $email = trim(mysqli_real_escape_string($connection, $_POST['email']));
    if (empty($email)) {
        $_SESSION['email_error'] = "Заполните поле";
    } else {
        $query = "SELECT id FROM users WHERE email='$email' LIMIT 1";
        $res = mysqli_query($connection, $query);
        if (mysqli_num_rows($res) == 1) {
            $expire = time() + 3600;
            $hash = md5($expire . $email);
            $query = "INSERT INTO forgot (hash,expire, email) VALUES ('$hash', $expire,'$email')";
            $res = mysqli_query($connection, $query);
            if (mysqli_affected_rows($connection) > 0) {
                //если добавлена запись в таблицу forgot
                $link = PATH . "forgot/?forgot={$hash}";
                $subject = "Запрос на восстановление праоля на сайте" . PATH;
                $body = "По ссылке <a href='{$link}'>{$link}</a>вы найдете страницу с формой, где вы можете ввести новый пароль 
                        Ссылка активна в течение 1 часа";
                //откуда:
                $headers = "FROM: " . strtoupper($_SERVER['SERVER_NAME']) . "\r\n";
                $headers .= "Content-type: text/html; charset=utf-8";
                mail($email, $subject, $body, $headers);
                $_SESSION['forgot']['success'] = "Письмо выслано";
            } else {
                $_SESSION['forgot']['error'] = 'Ошибка';
            }
        } else {
            $_SESSION['forgot']['error'] = 'Пользователь с такой почтой не найден';
        }
    }
}

function access_change()
{
    global $connection;
    $hash = trim(mysqli_real_escape_string($connection, $_GET['forgot']));
    //усли нет хэша
    if (empty($hash)) {
        $_SESSION['forgot']['error'] = 'Ссылка некорректна';
        return;
    }
    $query = "SELECT * FROM forgot WHERE hash='$hash' LIMIT 1";
    $res = mysqli_query($connection, $query);
    if (!mysqli_num_rows($res)) {
        $_SESSION['forgot']['error'] = 'Вы перешли по некорректной ссылке.
        Пройдите процедуру восстановления пароля заново';
        return;
    }
    $now = time();
    $row = mysqli_fetch_assoc($res);
    //если ссылка просрочена
    if ($row['expire'] - $now < 0) {
        $_SESSION['forgot']['error'] = 'Ссылка устарела или вы перешли по некорректной ссылке.
        Пройдите процедуру восстановления пароля заново';
        return;
    }
}

//смена пароля
function change_forgot_password()
{
    global $connection;
    $hash = trim(mysqli_real_escape_string($connection, $_POST['hash']));
    $password = trim($_POST['new-password']);
    if (empty($password)) {
        $_SESSION['change_error'] = "Заполните поле";
        return;
    }
    $query = "SELECT * FROM forgot WHERE hash='$hash' LIMIT 1";
    $res = mysqli_query($connection, $query);
    if (!mysqli_num_rows($res)) {
        return;
    }
    $now = time();
    $row = mysqli_fetch_assoc($res);
    //если ссылка просрочена
    if ($row['expire'] - $now < 0) {
        mysqli_query($connection, "DELETE FROM forgot WHERE expire < $now");
        return;
    }
    $password = md5($password);
    mysqli_query($connection, "UPDATE users SET password ='$password' WHERE email='{$row['email']}'");
    //если пользователь запросил несколько раз подряд,удаляем предыдущие запросы
    mysqli_query($connection, "DELETE FROM forgot WHERE email='{$row['email']}'");
    $_SESSION['forgot']['change_success']="Пароль изменен";
}
