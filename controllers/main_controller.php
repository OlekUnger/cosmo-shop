<?php
defined("CATALOG") or die("Access denied");

require_once 'models/main_model.php';

$categories = get_cat();
$categories_tree = map_tree($categories);
$categories_menu = categories_to_string($categories_tree);

check_remember();

//получение страниц меню
$pages = get_pages();