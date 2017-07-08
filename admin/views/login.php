
<?php require_once "_head.php"; ?>
<div class="wrapper">
    <?php require_once "_header.php"; ?>
	<div class="main-content">
		<div class="form-wrap">
			<div class="auth">


				<div class="" id="enter-form">

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
						<div class="flex-between">
							<!--							<a href="#" class="btn-front">Забыли пароль?</a>-->
							<p>

								<input type="checkbox" id="remember-me" name="remember">
								<label for="remember-me" class="remember-me">
									<span class="teal" style="margin-right:10px"></span>
									Запомнить меня
								</label>
							</p>
						</div>

						<!--								 <a href="#" class="btn---><? //=$classFront?><!--">Забыли пароль?</a>-->
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


			</div>


		</div>
	</div>
</div>
</div>

</div>

<?php require_once '_footer.php'; ?>



