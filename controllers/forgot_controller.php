<?php
defined("CATALOG") or die("Access denied");

include "main_controller.php";
include "models/{$view}_model.php";

//если запрошено восстановление пароля
if(isset($_POST['reset-password'])){
    forgot();
    redirect();
}else{
    redirect(PATH);
}

//include "views/{$view}.php";