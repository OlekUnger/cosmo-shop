<?php
defined("CATALOG") or die("Access denied");

require_once "main_controller.php";
require_once "models/{$view}_model.php";

if(isset($_POST['val'])){
    echo access_field();
    exit;
}
if(isset($_POST['reg_in'])){
    registration();
    redirect();
}

//if(isset($_SESSION['auth']['user'])){
//    redirect(PATH);
//}

//$breadcrumbs = "<a href='" .PATH. "'>Главная</a>";
//$breadcrumbs .= "<a href='"#"'>Регистрация</a>";
require_once "views/{$view}.php";

