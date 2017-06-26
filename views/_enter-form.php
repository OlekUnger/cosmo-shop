
<div id="enter-form">

	<form action="<?= PATH ?>login" method="POST" class="form">

		<div class="form_item">
			<label for="comment_author">Логин:</label>
			<input type="text" name="login" id="login" value="">
		</div>
		<div class="form_item">
			<label for="password">Пароль:</label>
			<input type="text" name="password" id="password">
		</div>

		<a href="#" class="reset-password_btn">Забыли пароль?</a>
		<div class="form_footer">
			<div class="message">

             <?php if(isset($_SESSION['auth']['mess'])): ?>
					 <span class="error">
                  <?php echo $_SESSION['auth']['mess']; ?>
					 </span>
                 <?php unset($_SESSION['auth']); ?>
             <?php else: ?>
					 <span class="success">
                  <?=$_SESSION['auth']['mess']; ?>
					 </span>

             <?php endif; ?>

			</div>

			<button type="submit" class="btn login" name="log_in">Войти</button>
		</div>

	</form>
</div>
