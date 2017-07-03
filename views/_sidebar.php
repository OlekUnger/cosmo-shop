<?php defined("CATALOG") or die("Access denied"); ?>

<div class="sidebar">
<!--	<div class="sidebar_item">-->
       <?php if (!isset($page_alias)): ?>
			 <a href="<?=PATH?>" class="menu_logo">
				 <img src="<?= PATH ?>views/img/logo12.png" alt="">
			 </a>
       <?php endif; ?>
<!--	</div>-->
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
