<?php
defined("CATALOG") or die("Access denied");

include "main_controller.php";
include "models/{$view}_model.php";

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
include "views/{$view}.php";

