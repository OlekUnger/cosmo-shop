<?php
defined("CATALOG") or die("Access denied");

include "main_controller.php";
include "models/{$view}_model.php";

if(isset($product_alias)){
    // массив данных продукта:
    $get_one_product = get_one_product($product_alias);
    // получаем id категории:
    $id = $get_one_product['parent'];
}

// id товара
$product_id = $get_one_product['id'];
//кл во комментариев
$count_comments = count_comments($product_id);
//получаем комментарии к товару
$get_comments = get_comments($product_id);
//строим дерево комментариев
$comments_tree = map_tree($get_comments);
//получаем htmlкомментариев
$comments = categories_to_string($comments_tree, 'comments_template.php');


include "libs/breadcrumbs.php";
include "views/{$view}.php";