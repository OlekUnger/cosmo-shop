<?php
defined("CATALOG") or die("Access denied");

//ХЛЕБНЫЕ-КРОШКИ-------------------------------------------------
//return true(array not empty) || return false
$breadcrumbs_array = breadcrumbs($categories, $id);
$breadcrumbs = '';
if ($breadcrumbs_array) {
//    $breadcrumbs = "<a class='breadcrumbs_link' href='" .PATH. "'>Главная</a> ";
    $breadcrumbs .= "<a class='breadcrumbs_link' href='" .PATH."category/'>Каталог</a> ";
    foreach ($breadcrumbs_array as $alias => $title) {
        $breadcrumbs .= "<a class='breadcrumbs_link' href='" .PATH. "category/{$alias}'>{$title}</a> ";
    }
    if(isset($get_one_product)){
        $breadcrumbs .= "<div class='breadcrumbs_link'>".$get_one_product['title']."</div>";
    }
} else {
//    $breadcrumbs = "<a class='breadcrumbs_link main_link' href='" .PATH. "'>Главная</a> ";
    $breadcrumbs .= "<a class='breadcrumbs_link' href='" .PATH."category/'>Каталог</a> ";
}
