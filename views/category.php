<?php defined("CATALOG") or die("Access denied"); ?>

<?php require_once "_head.php"; ?>
<div class="wrapper">
    <?php require_once "_header.php"; ?>
	<div class="main-content">

       <?php require_once '_sidebar.php'; ?>

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
								 <img class="empty_thumb" src="<?= PATH ?>views/img/pictures/image4.jpg" alt="">
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
<?php require_once '_footer.php'; ?>

