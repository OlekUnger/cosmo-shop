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
	<li class="menu_item">
		<a class="menu_link" href="<?php echo PATH ?>category/">Каталог</a>
	</li>
</ul>

<ul class="menu_list user_menu">

    <?php if (isset($_SESSION['auth']['user'])): ?>
		 <p class="user-name"><?=htmlspecialchars($_SESSION['auth']['user']);?></p>
	    <li class="menu_item">
		    <a href="<?=PATH?>logout" class="menu_link enter-form_btn">Выйти</a>
	    </li>
    <?php else: ?>
		 <li class="menu_item">
			 <span class="menu_link reg_btn">Регистрация</span>
		 </li>
		 <li class="menu_item">
			 <a href="<?=PATH?>login" class="menu_link enter-form_btn">Войти</a>
		 </li>
    <?php endif; ?>

</ul>

