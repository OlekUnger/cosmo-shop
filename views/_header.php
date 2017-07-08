
<header>
    <?php if (isset($page_alias)): ?>
		 <div class="header_top">
			 <div class="pic">
				 <div class="header_logo">
					 <img src="<?= PATH ?>views/img/logo12.png" alt="">
				 </div>
			 </div>
		 </div>
		 <div class="header_bottom">
			 <div class="container">
				 <nav class="header_nav">
                 <?php include "_menu.php"; ?>
				 </nav>
			 </div>
		 </div>
    <?php else: ?>
		 <div class="header_bottom">
			 <div class="container">

				 <nav class="header_nav">
                 <?php include "_menu.php"; ?>

				 </nav>
			 </div>
		 </div>
    <?php endif; ?>
</header>