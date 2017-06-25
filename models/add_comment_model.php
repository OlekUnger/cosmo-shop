<?php
defined("CATALOG") or die("Access denied");

//получение комментариев
function add_comment()
{
    global $connection;
    $comment_author = trim(mysqli_real_escape_string($connection, $_POST['commentAuthor']));
    $comment_text = trim(mysqli_real_escape_string($connection, $_POST['commentText']));
    $parent = (int)$_POST['parent'];
    $product_id = (int)$_POST['productId'];

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
    $query = "INSERT INTO comments (comment_author, comment_text, parent, product_id) 
              VALUES ('$comment_author','$comment_text', $parent, $product_id)";
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
    if ($comment['is_admin']) {
        $user_class = 'admin';
    } else {
        $user_class = 'user';
    }
    if ((int)$comment['parent'] > 0) {
        $content_class = 'child-comment';
    }

    $comment_html = "<div class='comment_content {$content_class}'>";
    $comment_html .= "<div class='comment_header'>";
    $comment_html .= "<span class='{$user_class}'>" . htmlspecialchars($comment['comment_author']) . "</span>";
    $comment_html .= "<span>" . $comment['created'] . "</span>";
    $comment_html .= "</div>";
    $comment_html .= "<div class='comment_text'>" . htmlspecialchars(nl2br($comment['comment_text'])) . "</div>";
    $comment_html .= "</div>";
    $res = array('answer' => 'Комментарий добавлен', 'code' => $comment_html, 'id' => $comment_id);
    return json_encode($res);
}