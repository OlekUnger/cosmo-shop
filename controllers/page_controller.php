<?php
defined("CATALOG") or die("Access denied");

include "main_controller.php";
include "models/{$view}_model.php";
if(!isset($page_alias)){
    $page_alias = 'index';
}
//if(!$page){
//    include 'views/404.php';
//    exit;
//}

$page = get_one_page($page_alias);
//$breadcrumbs = "<a href='" .PATH. "'>Главная</a>";
include "views/{$view}.php";

