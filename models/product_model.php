<?php
defined("CATALOG") or die("Access denied");

//Получение товара
function get_one_product($product_alias)
{
    global $connection;
    $product_alias = mysqli_real_escape_string($connection, $product_alias);
    $query = "SELECT * FROM products WHERE alias = '$product_alias'";
    $res = mysqli_query($connection, $query);
    return mysqli_fetch_assoc($res);
}
//получение комментариев
function get_comments($product_id){
    global $connection;
    $query = "SELECT * FROM comments WHERE product_id = $product_id";
    $res =  mysqli_query($connection, $query);
    $comments =array();
    while($row = mysqli_fetch_assoc($res)){
        $comments[$row['comment_id']] = $row;
    }
    return $comments;
}