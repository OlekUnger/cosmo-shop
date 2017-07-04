<?php
defined("CATALOG") or die("Access denied");

require_once "main_controller.php";
require_once "models/{$view}_model.php";
if(!isset($page_alias)){
    $page_alias = 'index';
}
//if(!$page){
//    header("HTTP/1.1 404 Not Found");
//    include 'views/404.php';
//    exit;
//}

$page = get_one_page($page_alias);
//$breadcrumbs = "<a href='" .PATH. "'>Главная</a>";
require_once "views/{$view}.php";

