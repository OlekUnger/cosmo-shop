<?php defined("CATALOG") or die("Access denied"); ?>
<?php if(isset($_SESSION['email_error'])){
    $classBack="front";
    $classFront="back";
}else{
	 $classFront="front";
	 $classBack="back";
};?>
<?php include "_head.php"; ?>
<div class="wrapper">
    <?php include "_header.php"; ?>
	<div class="main-content">
	<div class="form-wrap">
       <?php if(isset($_SESSION['forgot']['success'])):?>
			 <div class="notice">
				 <h2><?php echo $_SESSION['forgot']['success']; ?>
                 <?php unset($_SESSION['forgot']['success']); ?></h2>
			 </div>
       <?php else:?>
			 <div class="auth">

				 <div class="flipContainer">
					 <div class="flipper">

						 <div class="<?=$classFront?>" id="enter-form">

							 <form class="form" action="<?= PATH ?>login" method="POST">
								 <div class="form_header">
									 <h4>Вход</h4>
								 </div>
								 <div class="form_item">
									 <label for="login">Логин:</label>
									 <input type="text" name="login" id="login" value="">
								 </div>
								 <div class="form_item">
									 <label for="password">Пароль:</label>
									 <input type="text" name="password" id="password">
								 </div>

								 <a href="#" class="btn-<?=$classFront?>">Забыли пароль?</a>
								 <div class="form_footer">
									 <div class="message">

                                <?php if (isset($_SESSION['enter_error'])): ?>
											  <span class="error">
                                    <?php echo $_SESSION['enter_error']; ?>
                                    <?php unset($_SESSION['enter_error']); ?>
										 </span>
                                <?php endif; ?>

									 </div>

									 <button type="submit" class="btn" name="log_in">Войти</button>
								 </div>

							 </form>
						 </div>

						 <div id="reset-password_form" class="<?=$classBack?>">
							 <form class="form" action="<?= PATH ?>forgot" method="post">
								 <div class="form_header">
									 <h4>Восстановление пароля</h4>
								 </div>
								 <div class="form_item">
									 <label for="email">Email:</label>
									 <input type="text" name="email" id="email" value="">
								 </div>
								 <a href="#" class="btn-<?=$classBack?>">Войти</a>
								 <div class="form_footer">
									 <div class="message">

                                <?php if (isset($_SESSION['email_error'])): ?>
											  <span class="error">
											  <?php echo $_SESSION['email_error']; ?>
                                   <?php unset($_SESSION['email_error']); ?>
										 </span>
                                <?php endif; ?>
									 </div>

									 <button type="submit" class="btn" name="reset-password">Восстановить</button>
								 </div>

							 </form>
						 </div>

					 </div>


				 </div>
			 </div>
       <?php endif;?>
	</div>


</div>
</div>
<!--		восстановление пароля-->
<?php include '_footer.php';?>
<?php include '_scripts.php'; ?>