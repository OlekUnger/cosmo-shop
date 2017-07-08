<?php $menu_title = 'Настройки товара' ?>
<?php require_once "_head.php"; ?>
	<div class="wrapper">
       <?php require_once "_header.php"; ?>
		<div class="main-content">
          <?php include '_sidebar.php'; ?>
			<div class="content">
				<div class="nav_panel">
					<div class="breadcrumbs">
                   <?php echo $breadcrumbs; ?>
					</div>
                <?php if ($products): ?>
						 <div class="pagination"><?php echo $pagination; ?></div>
                <?php endif; ?>
				</div>
				<div class="products">
					<table class="zebra" data-table="edit-product">
						<thead>
						<tr>
							<th>ID</th>
							<th>Название</th>
							<th>Цена</th>
							<th>Редактировать</th>
							<th>Удалить</th>
						</tr>
						</thead>
						<tbody>
                  <?php if ($products): ?>
                      <?php foreach ($products as $product): ?>
								<tr>
									<td><?= $product['id'] ?></td>
									<td><?= $product['title'] ?></td>
									<td>
										<input type="text" data-id="<?= $product['price'] ?>" name="price"
										       value="<?= $product['price'] ?>" class="edit-price">
									</td>
									<td><a href="<?= PATH ?>edit-product/<?= $product['id'] ?>"" class="btn-icon
										btn-icon--edit"></a></td>
									<td><a href="#" data-id="<?= $product['id'] ?>" class="btn-icon btn-icon--delete"></a></td>
								</tr>
                      <?php endforeach; ?>
                  <?php endif; ?>
						</tbody>
					</table>
				</div>
             <?php if ($products): ?>
					 <div class="pagination"><?php echo $pagination; ?></div>
             <?php endif; ?>
			</div>

		</div>

	</div>

	<!--</div>-->

<?php require_once '_footer.php'; ?>