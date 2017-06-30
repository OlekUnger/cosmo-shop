<?php defined("CATALOG") or die("Access denied"); ?>
<?php $active = array_shift(explode('/',$url));?>

<ul class="menu_list">
    <?php foreach ($pages as $link => $page_name): ?>
        <?php if ($page_name == 'Главная'): ?>
			 <li class="menu_item ">
				 <a class="menu_link <?php if(!$url) echo "active"?>" href="<?php echo PATH ?>"><?php echo $page_name; ?></a>
			 </li>
        <?php else: ?>
			 <li class="menu_item">
				 <a class="menu_link <?php if(isset($page_alias) && $page_alias == $link) echo 'active'?>" href="<?php echo PATH . 'page/' . $link; ?>"><?php echo $page_name; ?></a>
			 </li>

        <?php endif; ?>
    <?php endforeach; ?>

	<li class="menu_item">
		<a class="menu_link <?php if($active=='category' || $active=='product' )  echo 'active'?>" href="<?php echo PATH ?>category/">Каталог</a>
	</li>
</ul>

<?php //endif; ?>
<!--<a href="#" class="menu_logo" style="opacity: .3;">-->
<!--	<img src="--><?//=PATH?><!--views/img/logo12.png" alt="" >-->
<!--</a>-->
<!--<div href="#" class="menu_logo">-->
<!--	<div class="logo_img"></div>-->
<!--	<div class="logo_img"></div>-->
<!--</div>-->

<ul class="menu_list user_menu">
	<li class="menu_item">
		<form action="" class="search_form">
			<div class="form_item">
				<input type="text" name="search" id="search" value="" placeholder="Введите запрос">
				<button type="submit" class="search_btn" name=""></button>
			</div>
		</form>
	</li>
    <?php if (isset($_SESSION['auth']['user'])): ?>
		 <p class="user-name"><?=htmlspecialchars($_SESSION['auth']['user']);?></p>
	    <li class="menu_item">
		    <a href="<?=PATH?>logout" class="menu_link enter-form_btn <?php if($active=='logout') echo 'active'?>">Выйти</a>
	    </li>
    <?php else: ?>
		 <li class="menu_item">
			 <a href="<?=PATH?>register" class="menu_link reg_btn  <?php if($active=='register') echo 'active'?>">Регистрация</a>
		 </li>
		 <li class="menu_item">
			 <a href="<?=PATH?>login" class="menu_link enter-form_btn <?php if($active=='login') echo 'active'?>">Войти</a>
		 </li>
    <?php endif; ?>

</ul>

