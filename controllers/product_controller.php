<?php
defined("CATALOG") or die("Access denied");

require_once "main_controller.php";
require_once "models/{$view}_model.php";

if(isset($product_alias)){
    // массив данных продукта:
    $get_one_product = get_one_product($product_alias);
    if(!$get_one_product){
        header("HTTP/1.1 404 Not Found");
        require_once 'views/404.php';
        exit;
    }
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
$comments = categories_to_string($comments_tree, '_comments_template.php');


require_once "libs/breadcrumbs.php";
require_once "views/{$view}.php";