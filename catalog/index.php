<?php
include 'catalog.php';

?>
<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="<?php echo PATH ?>css/style.css">
        <title>Document</title>
    </head>
    <body>
        <div class="wrapper">
            <div class="main-content">
                <div class="sidebar">
                    <div class="sidebar_item">
                        <div class="sidebar_item-header">
                            Каталог
                        </div>
                        <div class="sidebar_item-content">
                            <ul class="category">
                                <?php echo $categories_menu; ?>
                            </ul>
                        </div>

                    </div>
                </div>
                <div class="content">

	                <div class="breadcrumbs">
                       <?php echo $breadcrumbs;?>
	                </div>
	                <?php if($products):?>
		                <div class="pagination"><?php echo $pagination;?></div>
	                <?php endif;?>
                    <div class="products">
                        <?php if($products):?>
                            <?php foreach ($products as $product):?>

			                        <article class="products_item">
				                        <a class="product_img" href="<?php echo PATH ?>product.php?product=<?=$product['id'];?>">
					                        <img class="empty_thumb" src="img/<?=$product['image'];?>" alt="">
				                        </a>
				                        <div class="product_header">
					                        <div class="product_title">
	                                        <?php echo $product['title'];?>
					                        </div>
					                        <div class="product_price">
	                                        <?php echo $product['price'];?> $
					                        </div>
				                        </div>
			                        </article>

                            <?php endforeach; ?>
                        <?php else: ?>
                            <p>Ничего не найдено</p>
                        <?php endif;?>
                    </div>
                    <?php if($products):?>
		                 <div class="pagination"><?php echo $pagination;?></div>
                    <?php endif;?>
                </div>
            </div>

        </div>
        <script src="<?php echo PATH ?>js/jquery-1.9.0.min.js"></script>
        <script src="<?php echo PATH ?>js/jquery.accordion.js"></script>
        <script src="<?php echo PATH ?>js/jquery.cookie.js"></script>
        <script src="<?php echo PATH ?>js/main.js"></script>
    </body>
</html>
