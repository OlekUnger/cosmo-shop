<?php $menu_title='Настройки сайта'?>
<?php require_once "_head.php"; ?>
<div class="wrapper">
    <?php require_once "_header.php"; ?>
	<div class="main-content">
       <?php require_once '_sidebar.php'; ?>
		<div class="content">
			<table class="zebra admin-page" data-table="">
				<thead>
				<tr>
					<th>Настройка</th>
					<th>Значение</th>
				</tr>
				</thead>
				<tbody>
            <?php foreach ($get_options as $option): ?>
					<tr>
						<td><?= $option['name'] ?></td>
						<td>
							<input type="text" name="<?= $option['title'] ?>" value="<?= $option['value'] ?>" class="edit">
						</td>
					</tr>
            <?php endforeach; ?>

				</tbody>
			</table>
		</div>

	</div>
</div>

<?php require_once '_footer.php'; ?>
