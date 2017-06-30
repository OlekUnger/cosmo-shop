<?php defined("CATALOG") or die("Access denied"); ?>

<?php include "_header.php"; ?>
<div class="wrapper">
<?php include "_header.php"; ?>
	<div class="main-content">
	<?php if (isset($_SESSION['forgot']['change_success'])): ?>
	     <div class="notice">
		     <h2><?php echo $_SESSION['forgot']['change_success']; ?>
               <?php unset($_SESSION['forgot']['change_success']); ?></h2>
	     </div>
	<!--		ошибки доступа на изменение пароля-->
    <?php elseif (isset($_SESSION['forgot']['error'])): ?>
	     <div class="notice">
		     <h2><?php echo $_SESSION['forgot']['error']; ?>
               <?php unset($_SESSION['forgot']['error']); ?></h2>
	     </div>


    <?php elseif(isset($_SESSION['forgot']['change_error'])):?>
			<div class="form" id="forgot-form">
				<div class="form_header">
					<h4>Смена пароля</h4>
				</div>

				<form action="<?= PATH ?>forgot" method="POST">

					<div class="form_item">
						<label for="new-password">Новый пароль:</label>
						<input type="text" name="new-password" id="new-password" value="">
					</div>
					<input type="hidden" name="hash" value="<?=$_GET['forgot']?>">
					<div class="form_footer">
						<div class="message">

		                <?php if (isset($_SESSION['forgot']['change_error'])): ?>
								 <span class="error">
									  <?php echo $_SESSION['forgot']['change_error']; ?>
									  <?php unset($_SESSION['forgot']['change_error']); ?>
								 </span>

		                <?php else: ?>
								 <span class="success">
									  <?= $_SESSION['forgot']['change_success']; ?>
									  <?php unset($_SESSION['forgot']['change_success']); ?>
								 </span>
		                <?php endif; ?>
						</div>

						<button type="submit" class="btn" name="change_pass">Изменить</button>
					</div>
				</form>
			</div>

<!--       --><?php //include '_enter-form.php';?>

	 <?php else:?>
			<div class="form" id="forgot-form">
				<div class="form_header">
					<h4>Смена пароля</h4>
				</div>

				<form action="<?= PATH ?>forgot" method="POST">

			<div class="form_item">
				<label for="new-password">Новый пароль:</label>
				<input type="text" name="new-password" id="new-password" value="">
			</div>
			<input type="hidden" name="hash" value="<?=$_GET['forgot']?>">
			<div class="form_footer">
				<div class="message">

                <?php if (isset($_SESSION['change_error'])): ?>
						 <span class="error">
							  <?php echo $_SESSION['change_error']; ?>
							  <?php unset($_SESSION['change_error']); ?>
						 </span>
                <?php endif; ?>

				</div>
				<button type="submit" class="btn" name="change_pass">Изменить</button>
			</div>
		</form>


<!--       --><?php //include '_enter-form.php';?>
			</div>
	<?php endif; ?>
	</div>
</div>
<?php include '_footer.php';?>
<?php include '_scripts.php'; ?>