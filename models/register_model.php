<?php
defined("CATALOG") or die("Access denied");
//проверка доступности логина и почты
function access_field()
{
    global $connection;
    $fields = array('login', 'email');
    $val = trim(mysqli_real_escape_string($connection, $_POST['val']));
    $field = $_POST['dataField'];
    if (!in_array($field, $fields)) {
        return 'no';
    }
    $query = "SELECT id FROM users WHERE $field = '$val'";
    $res = mysqli_query($connection, $query);
    if (mysqli_num_rows($res) > 0) {
        return 'no';
    } else {
        return 'yes';
    }
}

//регистрация
function registration()
{
    global $connection;
    $fields = array('login' => 'Логин', 'email' => 'Почта');
    $login = trim($_POST['login_reg']);
    $password = trim($_POST['password_reg']);
    $name = trim($_POST['name_reg']);
    $email = trim($_POST['email_reg']);
    $post=array($login,$email);
    $errors='';
    if (empty($login)) $errors.="<li>Не заполнено поле Логин</li>"; else $_SESSION['reg']['reg_login']=$login;
    if (empty($password)) $errors.="<li>Не заполнено поле Пароль</li>";
    if (empty($name)) $errors.="<li>Не заполнено поле Имя</li>"; else $_SESSION['reg']['reg_name']=$name;
    if (empty($email)) $errors.="<li>Не заполнено поле Почта</li>"; else $_SESSION['reg']['reg_email']=$email;
    if(!empty($errors)){
        $_SESSION['reg']['reg_error']= "<ul>{$errors}</ul>";
        return;
    }

    $login = mysqli_real_escape_string($connection, $login);
    $email = mysqli_real_escape_string($connection, $email);
    $password = md5($password);
    $name = mysqli_real_escape_string($connection, $name);

    //проверка дублирования данных
    $query = "SELECT login, email FROM users WHERE login='$login' OR email='$email'";
    $res = mysqli_query($connection, $query);
    if (mysqli_num_rows($res) > 0) {
        $data = array();
        while ($row = mysqli_fetch_assoc($res)) {
            //находим совпадения
            $data = array_intersect($row, $post);
            foreach ($data as $key => $val) {
                $k[$key] = $key;
            }
        }
        foreach ($k as $key => $val) {
            $errors.= "<li>{$fields[$key]}</li>";
        }

        $_SESSION['reg']['reg_error']="Выберите другие значения для полей: <ul>{$errors}</ul>";
        return;
    }

    $query = "INSERT INTO users (login, password, email, name) 
                  VALUES ('$login','$password', '$email', '$name')";

    $res = mysqli_query($connection,$query);
    if(mysqli_affected_rows($connection)>0){
        $_SESSION['reg']['reg_success']="Регистрация успешна";
        $_SESSION['auth']['user'] = stripslashes($name);
        $_SESSION['auth']['is_admin'] = 0;
    } else {
        $_SESSION['reg']['reg_error']="Ошибка регистрации";
    }
}