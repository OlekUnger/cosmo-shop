<?php defined("CATALOG") or die("Access denied"); ?>
<?php include "_head.php"; ?>
<div class="wrapper">
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
							 <img class="empty_thumb" src="<?= PATH ?>views/img/pictures/images.jpg" alt="">
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
					<h3>Комментарии (<?= $count_comments; ?>)</h3>
					<button class="open-form_btn btn-icon btn-icon--right">Оставить комментарий</button>
				</div>


				<ul class="comments_list">
	             <?php echo $comments; ?>
				</ul>
	          <?php if (!empty($comments)): ?>
					 <div class="comments_footer">
						 <button class="open-form_btn btn-icon btn-icon--left">Оставить комментарий</button>
					 </div>
	          <?php endif; ?>

			</div>

			<div id="comment-form">
				<form action="<?= PATH ?>add_comment" method="post">
					<?php if(isset($_SESSION['auth']['user'])):?>
						<div class="form_item" style="display: none">
							<label for="comment_author">Имя:</label>
							<input type="text" name="comment_author" id="comment_author" value="<?=htmlspecialchars($_SESSION['auth']['user']);?>">
						</div>
	             <?php else:?>
						<div class="form_item">
							<label for="comment_author">Имя:</label>
							<input type="text" name="comment_author" id="comment_author">
						</div>

	             <?php endif;?>
					<div class="form_item">
						<label for="comment_text">Сообщение:</label>
						<textarea type="text" name="comment_text" id="comment_text" rows="10"></textarea>
					</div>

					<input type="hidden" id="parent_id" name="parent" value="0">
				</form>

			</div>
		</div>
	</div>
	<div id="loader">
		<span></span>
	</div>
	<div id="errors">
		<h4></h4>
	</div>
</div>
<?php include '_footer.php';?>
<?php include '_scripts.php'; ?>
<script>
    $(document).ready(function () {

        $('#comment-form').dialog({
            autoOpen: false,
            width: 640,
            modal: true,
            title: 'Добавить сообщение',
            resizable: false,
            show: {effect: 'slide', duration: 500},
            hide: {effect: 'slide', duration: 500},
            buttons: {
                "Добавить": function () {
                    var commentAuthor = $.trim($('#comment_author').val()),
                        commentText = $.trim($('#comment_text').val()),
                        parent = $('#parent_id').val(),
                        productId = <?=$product_id?>;
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
                        beforeSend: function () {
                            $('#loader').fadeIn();
                        },
                        success: function (res) {
                            var result = JSON.parse(res);
                            if (result.answer == 'Комментарий добавлен') {
                                // если комментарий добавлен
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
                                        parentComment.append('<ul>' + showComment + '</ul>');
                                    }
                                }
                            } else {
                                //если комментарий не добавлен
                                $('#errors').find('h4').text(result.answer);
											$('#errors').delay(500).queue(function(){
	                                 $(this).dialog('open');
	                                 $(this).dequeue();
	                              });
//                                $('#errors').delay(500).queue(function (next) {
//                                    $(this).dialog('open');
//                                    $(next);
//                                });
                            }

                        },
                        error: function () {
                            alert("Ошибка");
                        },
                        complete: function () {
                            $('#loader').fadeOut();
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
