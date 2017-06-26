<?php include "_header.php"; ?>
	<div class="main-content">
	<!--		ошибки доступа на изменение пароля-->
    <?php if (isset($_SESSION['forgot']['error'])): ?>
	     <div class="notice">
		     <h2><?php echo $_SESSION['forgot']['error']; ?>
               <?php unset($_SESSION['forgot']['error']); ?></h2>
	     </div>

    <?php else: ?>
	<div class="form" id="forgot-form">
		<div class="form_header">
			<h4>Смена пароля</h4>
		</div>

		<form action="<?= PATH ?>forgot" method="POST">

			<div class="form_item">
				<label for="new-password">Пароль:</label>
				<input type="text" name="new-password" id="new-password" value="">
			</div>
			<input type="hidden" name="hash" value="<?=$_GET['forgot']?>">
			<div class="form_footer">
				<div class="message">

                <?php if (isset($_SESSION['forgot']['error'])): ?>
						 <span class="error">
							  <?php echo $_SESSION['forgot']['error']; ?>
							  <?php unset($_SESSION['forgot']['error']); ?>
						 </span>

                <?php else: ?>
						 <span class="success">
							  <?= $_SESSION['forgot']['success']; ?>
							  <?php unset($_SESSION['forgot']['success']); ?>
						 </span>
                <?php endif; ?>
				</div>

				<button type="submit" class="btn login" name="log_in">Изменить</button>
			</div>
		</form>
       <?php endif; ?>


	</div>



<?php include '_scripts.php'; ?>