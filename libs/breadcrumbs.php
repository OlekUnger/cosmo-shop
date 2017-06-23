<?php
defined("CATALOG") or die("Access denied");

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