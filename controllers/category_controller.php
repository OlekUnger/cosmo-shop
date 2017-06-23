<?php
defined("CATALOG") or die("Access denied");

include "main_controller.php";
include "models/{$view}_model.php";
if(!isset($id)){
    $id= null;
}
include "libs/breadcrumbs.php";

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

include "views/{$view}.php";