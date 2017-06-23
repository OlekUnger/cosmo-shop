<?php
defined("CATALOG") or die("Access denied");

//распечатка массива
function print_arr($array)
{
    echo '<pre>' . print_r($array, true) . '</pre>';
}

//получение массива категорий
function get_cat()
{
    global $connection;
    $query = "SELECT * FROM categories";
    $result = mysqli_query($connection, $query);
    $arr_cat = array();
    while ($row = mysqli_fetch_assoc($result)) {
        $arr_cat[$row['id']] = $row;
    }
    return $arr_cat;
}

//Построение дерева
function map_tree($data)
{
    $tree = array();
    foreach ($data as $id => &$node) {
        if (!$node['parent']) {
            $tree[$id] = &$node;
        } else {
            $data[$node['parent']]['childs'][$id] =& $node;
        }
    }
    return $tree;
}

//дерево в строку html
function categories_to_string($data)
{
    $string = '';
    foreach ($data as $item) {
        $string .= categories_to_template($item);
    }
    return $string;
}

//шаблон вывода категорий
function categories_to_template($category)
{
//    $category = null;
    ob_start();
    include 'views/category_template.php';
    return ob_get_clean();
}

//Пагинация
function pagination($page, $count_pages, $modrew = true)
{
    $back = null; //- ссылка назад
    $forward = null; // - ссылка вперед
    $start_page = null; // - ссылка в начало
    $end_page = null; // -  ссылка в конец
    $page2left = null; // - вторая страница слева
    $page1left = null; // - первая страница слева
    $page2right = null; // - вторая страница справа
    $page1right = null; // - первая страница справа

    // формируем  ссылку,усли есть параметры в запросе:
    $uri = "?";
//    if ($_SERVER['QUERY_STRING']) {
//        foreach ($_GET as $key => $value) {
//            if ($key != 'page') $uri .= "{$key}=$value&amp;";
//        }
//    }
    if (!$modrew) {
        if ($_SERVER['QUERY_STRING']) {
            foreach ($_GET as $key => $value) {
                if ($key != 'page') $uri .= "{$key}=$value&amp;";
            }
        }
    } else {
        $url = $_SERVER['REQUEST_URI'];
        $url = explode('?', $url);
        if (isset($url[1]) && $url[1] != '') {
            $params = explode('&', $url[1]);
            foreach ($params as $param) {
                if (!preg_match("/page=/", $param)) {
                    $uri .= "{$param}&amp;";
                }
            }
        }
    }
    if ($page > 1) {
        $back = "<a class='pag_item' href='{$uri}page=" . ($page - 1) . "'>&lt;</a>";
    }
    if ($page < $count_pages) {
        $forward = "<a class='pag_item' href='{$uri}page=" . ($page + 1) . "'>&gt;</a>";
    }
    if ($page > 3) {
        $start_page = "<a class='pag_item' href='{$uri}page=1'>&laquo;</a>";
    }
    if ($page < ($count_pages - 2)) {
        $end_page = "<a class='pag_item' href='{$uri}page={$count_pages}'>&raquo;</a>";
    }
    if ($page - 2 > 0) {
        $page2left = "<a class='pag_item' href='{$uri}page=" . ($page - 2) . "'>" . ($page - 2) . "</a>";
    }
    if ($page - 1 > 0) {
        $page1left = "<a class='pag_item' href='{$uri}page=" . ($page - 1) . "'>" . ($page - 1) . "</a>";
    }
    if ($page + 1 <= $count_pages) {
        $page1right = "<a class='pag_item' href='{$uri}page=" . ($page + 1) . "'>" . ($page + 1) . "</a>";
    }
    if ($page + 2 <= $count_pages) {
        $page2right = "<a class='pag_item' href='{$uri}page=" . ($page + 2) . "'>" . ($page + 2) . "</a>";
    }

    return $start_page . $back . $page2left . $page1left . "<a class='pag_item active'>" . $page . "</a>" . $page1right . $page2right . $forward . $end_page;
}

//хлебные крошки
function breadcrumbs($categories, $id)
{
    if (!$id) return false;
    $breadcrumbs_array = array();
    for ($i = 0; $i < count($categories); $i++) {
        if (isset($categories[$id])){
            //ставим ключом id запрошенной категории, а значением название категории
            $breadcrumbs_array[$categories[$id]['id']] = $categories[$id]['title'];
            // перезаписываем  id на родительский, чтобы искать аналогично дальше по дереву
            $id = $categories[$id]['parent'];
        } else break;
    }
    return array_reverse($breadcrumbs_array, true);
}


