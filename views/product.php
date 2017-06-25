<?php include "_header.php"; ?>
<div class="main-content">

    <?php include '_sidebar.php'; ?>

	<div class="content">
		<div class="breadcrumbs">
          <?php echo $breadcrumbs; ?>
		</div>

		<div class="products">
          <?php if ($get_one_product): ?>
				 <article class="product_item--one">

					 <div class="product_img">
						 <img class="empty_thumb" src="<?= PATH ?>views/img/<?= $get_one_product['image']; ?>" alt="">
					 </div>
					 <div class="product_header">
						 <div class="product_title">
                       <?php echo $get_one_product['title']; ?>
						 </div>

						 <div class="product_price">
                       <?php echo $get_one_product['price']; ?> $
						 </div>
					 </div>
					 <div class="product_description">
                    <?php if ($get_one_product['content'] != '') {
                        echo $get_one_product['content'];
                    } else {
                        echo 'Описание отсутствует';
                    }
                    ?>
					 </div>
				 </article>
          <?php else: ?>
              <?php echo "Такого товара нет." ?>
          <?php endif; ?>

		</div>
		<div class="comments">
			<div class="comments_header">
				<h3>Комментарии</h3>
				<button class="open-form_btn btn-icon">Оставить комментарий</button>
			</div>


			<ul class="comments_list">
             <?php echo $comments; ?>
			</ul>
			<div class="comments_footer">
				<button class="open-form_btn btn-icon">Оставить комментарий</button>
			</div>
		</div>

		<div id="form-wrap">
			<form action="<?= PATH ?>add_comment" method="post" class="form">

				<div class="form_item">
					<label for="comment_author">Имя:</label>
					<input type="text" name="comment_author" id="comment_author">
				</div>

				<div class="form_item">
					<label for="comment_text">Сообщение:</label>
					<textarea type="text" name="comment_text" id="comment_text" rows="10"></textarea>
				</div>
				<input type="hidden" id="parent_id" name="parent" value="0">
			</form>

		</div>
	</div>
</div>


<?php include '_scripts.php'; ?>
<script>
    $(document).ready(function () {

        $('#form-wrap').dialog({
            autoOpen: false,
            width: 640,
            modal: true,
            title: 'Добавить сообщение',
            resizable: false,
            show: {effect: 'fade', duration: 500},
            hide: {effect: 'fade', duration: 500},
            buttons: {
                "Добавить": function () {
                    var commentAuthor = $.trim($('#comment_author').val()),
                        commentText = $.trim($('#comment_text').val()),
                        parent = $('#parent_id').val();
                    productId = <?=$product_id?>;
//                    console.log(commentAuthor +'|'+ commentText + '|' + parentId);
                    if (commentText == '' || commentAuthor == '') {
                        alert('Заполните поля формы');
                        return;
                    }
                    $('#comment_text').val('');
                    $(this).dialog('close');
                    $.ajax({
                        url: '<?=PATH?>add_comment',
                        type: 'POST',
                        data: {
                            commentAuthor: commentAuthor,
                            commentText: commentText,
                            parent: parent,
                            productId: productId
                        },
                        success: function (res) {
                            var result = JSON.parse(res);
//                            console.log(result);
                            var showComment = '<li class="comments_item new-comment" id="comment-' + result.id + '">' + result.code + '</li>';

                            if (parent == 0) {
                                //если это не ответ
                                $('ul.comments_list').append(showComment);
                            } else {
                                //если Это ответ
                                // находим родителя li
                                var parentComment = $this.closest('.comments_item');
                                //смотрим есть ли ответы
                                var childs = parentComment.children('ul');
                                if (childs.length) {
												//если ответы есть
                                    childs.append(showComment);
                                } else {
												//если ответов пока нет
                                    parentComment.append('<ul>'+ showComment +'</ul>');
                                }
                            }
                        },
                        error: function () {
                            alert("Ошибка");
                        }
                    });
                },
                "Отмена": function () {
                    $(this).dialog('close');
                    $('#comment_text').val('');
                }
            }
        });
    });
</script>
