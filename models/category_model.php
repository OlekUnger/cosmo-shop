<?php
defined("CATALOG") or die("Access denied");

//получение id  категорий по алиасу
function get_id($categories, $category_alias){
    if(!$category_alias) return false;
    foreach($categories as $key=>$value){
        if($value['alias']==$category_alias) return $key;
    }
    return false;
}
//Получение id дочерних категорий
function cat_id($categories, $id)
{
    if (!$id) return false;
    $data = '';
    foreach ($categories as $item) {
        if ($item['parent'] == $id) {
            $data .= $item['id'] . ',';
            $data .= cat_id($categories, $item['id']);
        }
    }
    return $data;
}

//Получение товаров
function get_products($ids = null, $start_pos, $perpage)
{
    global $connection;
    if ($ids) {
        $query = "SELECT * FROM products WHERE parent IN($ids) ORDER BY title LIMIT $start_pos,$perpage";
    } else {
        $query = "SELECT * FROM products ORDER BY title LIMIT $start_pos,$perpage";
    }
    $res = mysqli_query($connection, $query);
    $products = array();
    while ($row = mysqli_fetch_assoc($res)) {
        $products[] = $row;
    }
    return $products;
}

//количество товаров
function count_goods($ids)
{
    global $connection;
    if (!$ids) {
        $query = "SELECT COUNT(*) FROM products";
    } else {
        $query = "SELECT COUNT(*) FROM products WHERE parent IN($ids)";
    }
    $res = mysqli_query($connection, $query);
    $count_goods = mysqli_fetch_row($res);
    return $count_goods[0];
}
