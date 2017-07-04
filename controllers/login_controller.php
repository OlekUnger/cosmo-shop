<?php
defined("CATALOG") or die("Access denied");
require_once "main_controller.php";
//include "models/main_model.php";
require_once "models/login_model.php";

if(isset($_SESSION['auth']['user'])){
    redirect(PATH);
}

if(isset($_POST['log_in'])){
    authorization();
    if(!$_SESSION['enter_error']){
        redirect(PATH);
    }

} else {
//    header("Location:".PATH);
}
//если запрошено восстановление пароля
if(isset($_POST['reset-password'])){
    forgot();
    redirect();
}

include "views/{$view}.php";
