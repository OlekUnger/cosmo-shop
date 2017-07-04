<?php defined("CATALOG") or die("Access denied");

function check_remember(){
    // если пользователь авторизован - выходим
    if( isset( $_SESSION['auth']['user'] ) ) return;
    // если пользователь не запоминался
    if( !isset($_COOKIE['hash']) ) return;

    global $connection;
    $hash = mysqli_real_escape_string($connection, $_COOKIE['hash']);
    $query = "SELECT name, is_admin FROM users WHERE remember = '$hash'";
    $res = mysqli_query($connection, $query);
    if(mysqli_num_rows($res) == 1){
        $row = mysqli_fetch_assoc($res);
        $_SESSION['auth']['user'] = $row['name'];
        $_SESSION['auth']['is_admin'] = $row['is_admin'];
    }else{
        setcookie('hash', '', time() - 3600);
    }
}

function print_arr($array){
    echo "<pre>" . print_r($array, true) . "</pre>";
}

function redirect($http = false){
    if($http) $redirect = $http;
    else $redirect = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : PATH;
    header("Location: $redirect");
    exit;
}
