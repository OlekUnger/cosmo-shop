<?php
error_reporting(E_ALL);
define("CATALOG",true);


// ROUTING-----------------------------
//$url = str_replace('/catalog/','',$_SERVER['REQUEST_URI']);
$url =ltrim($_SERVER['REQUEST_URI'],'/');
$routes = array(
    array('url'=>'#^$|^\?#', 'view'=>'page'),
    array('url'=>'#^product/(?P<product_alias>[a-z0-9-]+)#i', 'view'=>'product'),
    array('url'=>'#^category/(?P<id>\d+)?#i','view'=>'category'),
    array('url'=>'#^page/(?P<page_alias>[a-z0-9-]+)#i','view'=>'page'),
    array('url'=>'#^add_comment#i','view'=>'add_comment')
);
foreach ($routes as $route){
    if(preg_match($route['url'],$url, $match)){
        $view = $route['view'];
        break;
    }
}

if(empty($match)){
    include 'views/404.php';
    exit;
}
extract($match);

// $id -id категории
// $product_ alias - alias продукта
// view - вид для подключения
include 'config.php';
include "controllers/{$view}_controller.php";
