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

include "libs/breadcrumbs.php";
include "views/{$view}.php";