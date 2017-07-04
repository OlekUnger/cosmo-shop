<?php
defined("CATALOG") or die("Access denied");

require_once "main_controller.php";
require_once "models/{$view}_model.php";

if(isset($_GET['term'])){
    $result_search = search_autocomplete();
    exit(json_encode($result_search));
} elseif(isset($_GET['search']) && $_GET['search']){
    // ПАГИНАЦИЯ ----------------------------------
// кол во товаров на страницу:
    $perpage = 12;
//общее кол во товаров:
    $count_goods = count_search();
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
    $result_search =search($start_pos,$perpage);
}

$breadcrumbs = "<a class='breadcrumbs_link main_link' href='" .PATH. "'>Главная</a> ";
$breadcrumbs .= "<a class='breadcrumbs_link' href='" .PATH."search/'>Результаты поиска</a> ";

require_once "views/{$view}.php";
