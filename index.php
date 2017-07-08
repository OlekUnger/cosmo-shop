<?php
//error_reporting(E_ALL);
define("CATALOG", true);
include 'config.php';
session_start();

// ROUTING-----------------------------

$url = ltrim($_SERVER['REQUEST_URI'], '/');
$routes = array(
    array('url' => '#^$|^\?#', 'view' => 'page'),
    array('url' => '#^login#i', 'view' => 'login'),
    array('url' => '#^logout#i', 'view' => 'logout'),
    array('url' => '#^forgot#i', 'view' => 'forgot'),
    array('url' => '#^register#i', 'view' => 'register'),
    array('url' => '#^product/(?P<product_alias>[a-z0-9-]+)#i', 'view' => 'product'),
    array('url' => '#^category/(?P<category_alias>[a-z0-9-]+)?#i', 'view' => 'category'),
    array('url' => '#^page/(?P<page_alias>[a-z0-9-]+)#i', 'view' => 'page'),
    array('url' => '#^add_comment#i', 'view' => 'add_comment'),
    array('url' => '#^search#i', 'view' => 'search')
);

//http://catalog.loc/index.php
$app_path = 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['PHP_SELF'];

//http://catalog.loc/
$app_path = preg_replace('#[^/]+$#', '', $app_path);
define("PATH", $app_path);

//http://catalog.loc/page/about
$url = 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];

//page/about
$url = str_replace(PATH, '', $url);
echo $url;
foreach ($routes as $route) {
    if (preg_match($route['url'], $url, $match)) {
        $view = $route['view'];
        break;
    }
}

if (empty($match)) {
//    http_response_code(404);
    include 'views/404.php';
    exit;
}
extract($match);

// $id -id категории
// $product_ alias - alias продукта
// view - вид для подключения

include "controllers/{$view}_controller.php";
