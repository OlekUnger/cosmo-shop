<?php defined("CATALOG") or die("Access denied"); ?>

<?php include "_head.php"; ?>
<div class="wrapper">
    <?php include "_header.php"; ?>
	<div class="main-content">

       <?php include '_sidebar.php'; ?>

		<div class="content">
			<div class="nav_panel">
				<div class="breadcrumbs">
                <?php echo $breadcrumbs; ?>
				</div>
             <?php if ($products): ?>
					 <div class="pagination"><?php echo $pagination; ?></div>
             <?php endif; ?>
			</div>
			<div class="products">
             <?php if ($products): ?>
                 <?php foreach ($products as $product): ?>

						 <article class="products_item">
							 <a class="product_img" href="<?php echo PATH ?>product/<?= $product['alias']; ?>">
								 <!--							 <img class="empty_thumb" src="--><? //= PATH ?><!--views/img/-->
                          <? //= $product['image']; ?><!--" alt="">-->
								 <img class="empty_thumb" src="<?= PATH ?>views/img/pictures/images.jpg" alt="">
							 </a>
							 <div class="product_header">
								 <div class="product_title">
                             <?php echo $product['title']; ?>
								 </div>
								 <div class="product_price">
                             <?php echo $product['price']; ?> $
								 </div>
							 </div>
						 </article>

                 <?php endforeach; ?>
             <?php else: ?>
					 <p>Ничего не найдено</p>
             <?php endif; ?>
			</div>
          <?php if ($products): ?>
				 <div class="pagination"><?php echo $pagination; ?></div>
          <?php endif; ?>
		</div>
	</div>
</div>
<?php include '_footer.php'; ?>
<?php include '_scripts.php'; ?>
