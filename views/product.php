<?php include "_header.php";?>
    <div class="main-content">

	     <?php include '_sidebar.php';?>

        <div class="content">
            <div class="breadcrumbs">
                <?php echo $breadcrumbs;?>
            </div>

            <div class="products">
               <?php if($get_one_product):?>
                    <article class="product_item--one">

                        <div class="product_img">
                            <img class="empty_thumb" src="<?=PATH?>views/img/<?=$get_one_product['image'];?>" alt="">
                        </div>
                        <div class="product_header">
                            <div class="product_title">
                                <?php echo $get_one_product['title'];?>
                            </div>

                            <div class="product_price">
                                <?php echo $get_one_product['price'];?> $
                            </div>
                        </div>
                        <div class="product_description">
                            <?php if($get_one_product['content']!=''){
                                echo $get_one_product['content'];
                            } else { echo 'Описание отсутствует';}
                            ?>
                        </div>
                    </article>
               <?php else:?>
                   <?php  echo "Такого товара нет." ?>
               <?php endif; ?>

            </div>

        </div>
    </div>

</div>
<script src="<?php echo PATH ?>views/js/jquery-1.9.0.min.js"></script>
<script src="<?php echo PATH ?>views/js/jquery.accordion.js"></script>
<script src="<?php echo PATH ?>views/js/jquery.cookie.js"></script>
<script src="<?php echo PATH ?>views/js/main.js"></script>
</body>
</html>
