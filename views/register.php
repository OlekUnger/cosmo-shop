
<?php require_once "_head.php"; ?>

<div class="wrapper">
    <?php require_once "_header.php"; ?>
	<div class="main-content">
       <?php if (isset($_SESSION['reg']['reg_success'])): ?>
			 <div class="notice">
				 <h2>Вы зарегистрированы</h2>
			 </div>

       <?php else: ?>
			 <div class="form-wrap">
				 <div class="register-form" id="register-form">

					 <form class="form" action="<?= PATH ?>register" method="POST">
						 <div class="form_header">
							 <h4>Регистрация</h4>
						 </div>
						 <div class="form_item">
							 <label for="name_reg">Имя:
								 <span class="check-icon"></span>
							 </label>
							 <input type="text" name="name_reg" id="name_reg" data-field="name"
							        value="<?php if ($_SESSION['reg']['reg_name']){echo $_SESSION['reg']['reg_name'];}  ?>">
						 </div>
						 <div class="form_item">
							 <label for="email_reg"> Email:<span class="check-icon"></span></label>
							 <input class="access" type="text" data-field="email" name="email_reg" id="email_reg"
							        value="<?php if (isset($_SESSION['reg']['reg_email'])) echo $_SESSION['reg']['reg_email']; ?>">
						 </div>
						 <div class="form_item">
							 <label for="login_reg">Логин:<span class="check-icon"></span></label>
							 <input class="access" type="text" data-field="login" name="login_reg" id="login_reg"
							        value="<?php if (isset($_SESSION['reg']['reg_login'])) echo $_SESSION['reg']['reg_login'];?>">
						 </div>
						 <div class="form_item">
							 <label for="password_reg">Пароль:<span class="check-icon"></span></label>
							 <input type="password" name="password_reg" id="password_reg" data-field="password">
						 </div>
						 <div class="form_item">
							 <label for="password_reg2">Повторите пароль:<span class="check-icon"></span></label>
							 <input type="password" name="password_reg2" id="password_reg2">
						 </div>


						 <div class="form_footer">
							 <div class="message">

                          <?php if (isset($_SESSION['reg']['reg_error'])): ?>
									  <div class="error">
                                 <?php echo $_SESSION['reg']['reg_error'];
                                 unset($_SESSION['reg']); ?>
									  </div>
                          <?php endif; ?>

							 </div>

							 <button type="submit" class="btn" name="reg_in">Отправить</button>
						 </div>

					 </form>
				 </div>
			 </div>

       <?php endif; ?>


	</div>
</div>
<?php require_once '_footer.php'; ?>

