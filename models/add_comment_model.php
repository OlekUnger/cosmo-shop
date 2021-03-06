<?php
defined("CATALOG") or die("Access denied");

//добавление комментариев
function add_comment()
{
    global $connection;
    $comment_author = trim(mysqli_real_escape_string($connection, $_POST['commentAuthor']));
    $comment_text = trim(mysqli_real_escape_string($connection, $_POST['commentText']));
    $parent = (int)$_POST['parent'];
    $product_id = (int)$_POST['productId'];
    if (isset($_SESSION['auth']['is_admin'])) {
        $is_admin = $_SESSION['auth']['is_admin'];
    } else {
        $is_admin =0;
    }

    //если нет id товара
    if (!$product_id) {
        $res = array('answer' => 'Неизвестный продукт');
        return json_encode($res);
    }
    //если не заполнены поля
    if (empty($comment_author) || empty($comment_text)) {
        $res = array('answer' => 'Заполните поля');
        return json_encode($res);
    }
    $query = "INSERT INTO comments (comment_author, comment_text, parent, product_id, is_admin) 
              VALUES ('$comment_author','$comment_text', $parent, $product_id, $is_admin)";
    $res = mysqli_query($connection, $query);
    if (mysqli_affected_rows($connection) > 0) {
        //id полседнего добавленного комментария
        $comment_id = mysqli_insert_id($connection);
        $comment_html = get_last_comment($comment_id);
        return $comment_html;
    } else {
        $res = array('answer' => 'Ошибка добавления комментария');
        return json_encode($res);
    }
}

// получение добавленного комментария
function get_last_comment($comment_id)
{
    global $connection;
    $query = "SELECT * FROM comments WHERE comment_id = $comment_id";
    $res = mysqli_query($connection, $query);
    $comment = mysqli_fetch_assoc($res);
    ob_start();
    include 'views/_new_comment.php';
    $comment_html = ob_get_clean();

    $res = array('answer' => 'Комментарий добавлен', 'code' => $comment_html, 'id' => $comment_id);
    return json_encode($res);
}


