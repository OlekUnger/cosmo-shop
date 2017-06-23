<?php
error_reporting(E_ALL);
define("CATALOG",true);
include 'config.php';
include 'functions.php';

// ROUTING-----------------------------
$url = str_replace('/catalog/','',$_SERVER['REQUEST_URI']);

$routes = array(
    array('url'=>'#^$|^\?#', 'view'=>'category'),
    array('url'=>'#^product/(?P<product_alias>[a-z0-9-]+)#i', 'view'=>'product'),
    array('url'=>'#^category/(?P<id>\d+)#i','view'=>'category')
);
foreach ($routes as $route){
    if(preg_match($route['url'],$url, $match)){
        $view = $route['view'];
        break;
    }
}

if(empty($match)){
    include 'views/404.php';
    exit;
}
extract($match);
// $id -id категории
// $product_ alias - alias продукта
// view - вид для подключения


$categories = get_cat();
$categories_tree = map_tree($categories);
$categories_menu = categories_to_string($categories_tree);

if(isset($product_alias)){
    // массив данных продукта:
    $get_one_product = get_one_product($product_alias);
    // получаем id категории:
    $id = $get_one_product['parent'];
}

//ХЛЕБНЫЕ-КРОШКИ-------------------------------------------------
//return true(array not empty) || return false
$breadcrumbs_array = breadcrumbs($categories, $id);
$breadcrumbs = '';
if ($breadcrumbs_array) {
    $breadcrumbs = "<a class='breadcrumbs_link' href='" .PATH. "'>Главная</a>";
    foreach ($breadcrumbs_array as $id => $title) {
        $breadcrumbs .= "<a class='breadcrumbs_link' href='" .PATH. "category/{$id}'>{$title}</a>";
    }
    if(isset($get_one_product)){
        $breadcrumbs .= "<div class='breadcrumbs_link'>".$get_one_product['title']."</div>";
    }
} else {
    $breadcrumbs = "<a class='breadcrumbs_link main_link' href='" .PATH. "'>Главная</a>";
}
//id дочерних категорий
$ids = cat_id($categories, $id);
if (!$ids) {
    $ids = $id;
} else {
    $ids = rtrim($ids, ',');
}

// ПАГИНАЦИЯ ----------------------------------
// кол во товаров на страницу:
$perpage = 12;
//общее кол во товаров:
$count_goods = count_goods($ids);
//необходимоу кол во страниц:
$count_pages = ceil($count_goods / $perpage);
//минимум одна страница должна быть:
if (!$count_pages) $count_pages = 1;
// получение запрошенной страницы:
if (isset($_GET['page'])) {
    $page = (int)$_GET['page'];
    if ($page < 1) $page = 1;
} else {
    $page = 1;
}
//если запрошенная страница больше  имеющегося
if ($page > $count_pages) $page = $count_pages;
// Начальная позиция для запроса:
$start_pos = ($page - 1) * $perpage;
$pagination = pagination($page, $count_pages);
//---------------
$products = get_products($ids, $start_pos, $perpage);

//-----------------------------------
include "views/{$view}.php";
