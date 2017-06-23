<?php defined("CATALOG") or die("Access denied"); ?>

<ul class="menu_list">
    <?php foreach ($pages as $link => $page_name): ?>
        <?php if ($page_name == 'Главная'): ?>
			 <li class="menu_item">
				 <a class="menu_link" href="<?php echo PATH ?>"><?php echo $page_name; ?></a>
			 </li>
            <?php else: ?>
			 <li class="menu_item">
				 <a class="menu_link" href="<?php echo PATH . 'page/' . $link; ?>"><?php echo $page_name; ?></a>
			 </li>
        <?php endif; ?>
    <?php endforeach; ?>
</ul>
