<?php
include 'config.php';
include 'functions.php';

$categories = get_cat();
$categories_tree = map_tree($categories);
$categories_menu = categories_to_string($categories_tree);



if(isset($_GET['product'])){
    $product_id = (int)$_GET['product'];
    // массив данных продукта
    $get_one_product = get_one_product($product_id);
    // получаем шв категории:
    $id = $get_one_product['parent'];
} else {
    // массив данных категории
    $id = (int)$_GET['category'];
}

//хлебные крошки
//return true(array not empty) || return false
$breadcrumbs_array = breadcrumbs($categories, $id);
$breadcrumbs = '';
if ($breadcrumbs_array) {
    $breadcrumbs = "<a class='breadcrumbs_link' href='" .PATH. "'>Каталог</a>";
    foreach ($breadcrumbs_array as $id => $title) {
        $breadcrumbs .= "<a class='breadcrumbs_link' href='" .PATH. "category/{$id}'>{$title}</a>";
    }
    if(isset($get_one_product)){
        $breadcrumbs .= "<div class='breadcrumbs_link'>".$get_one_product['title']."</div>";
    }
} else {
    $breadcrumbs = "<a class='breadcrumbs_link main_link' href='" .PATH. "'>Каталог</a>";
}
//id дочерних категорий
$ids = cat_id($categories, $id);
if (!$ids) {
    $ids = $id;
} else {
    echo $ids = rtrim($ids, ',');
}
// Пагинация
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
