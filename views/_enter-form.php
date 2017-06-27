<!--	авторизация-->
<div id="auth">
	<div class="form" id="enter-form">
		<div class="form_header">
			<h4>Вход</h4>
		</div>
		<form action="<?=PATH?>login" method="POST">

			<div class="form_item">
				<label for="login">Логин:</label>
				<input type="text" name="login" id="login" value="">
			</div>
			<div class="form_item">
				<label for="password">Пароль:</label>
				<input type="text" name="password" id="password">
			</div>

			<a href="#" class="reset-password_link">Забыли пароль?</a>
			<div class="form_footer">
				<div class="message">

                <?php if (isset($_SESSION['error'])): ?>
						 <span class="error">
                  <?php echo $_SESSION['error']; ?>
                  <?php unset($_SESSION['error']); ?>
					 </span>

                <?php else: ?>
						 <span class="success">
                  <?= $_SESSION['success']; ?>
                  <?php unset($_SESSION['success']); ?>
					 </span>
                <?php endif; ?>
				</div>

				<button type="submit" class="btn login" name="log_in">Войти</button>
			</div>

		</form>
	</div>


<!--		восстановление пароля-->
	<div id="reset-password_form" class="form">
		<div class="form_header">
			<h4>Вход</h4>
		</div>
		<form action="<?= PATH ?>forgot" method="post">
			<div class="form_item">
				<label for="email">Email:</label>
				<input type="text" name="email" id="email" value="">
			</div>
			<a href="#" class="enter_link">Войти</a>
			<div class="form_footer">
				<div class="message">

                <?php if (isset($_SESSION['error'])): ?>
						 <span class="error">
                  <?php echo $_SESSION['error']; ?>
                  <?php unset($_SESSION['error']); ?>
					 </span>

                <?php else: ?>
						 <span class="success">
                  <?= $_SESSION['success']; ?>
                  <?php unset($_SESSION['success']); ?>
					 </span>
                <?php endif; ?>
				</div>

				<button type="submit" class="btn" name="reset-password">Восстановить</button>
			</div>

		</form>
	</div>
</div>
