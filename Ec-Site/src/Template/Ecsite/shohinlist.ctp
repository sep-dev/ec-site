<div>
	<h3>商品一覧</h3>
	<?= $this -> Form -> create() ?>
	<fieldset>
		<?= $this -> Form -> input('find') ?>
		<?= $this -> Form -> button('Find') ?>
	</fieldset>
	<table>
		<thead>
			<tr>
				<th>Name</th>
				<th>Image</th>
				<th>Data</th>
				<th>Price</th>
			<tr>
		<thead>
		<tbody>
		<?php foreach ($tblitem as $tblitem): ?>
			<tr>
				<td><?= $tblitem -> itemName ?></td>
				<td><img src="/ec-site/Ec-Site/image/<?= $tblitem -> itemImg ?>"></td>
				<td><?= $tblitem -> itemData ?></td>
				<td>&yen;<?= $tblitem -> itemPrice ?></td>
			<tr>
		<?php endforeach; ?>
		</tbody>
	</table>
	<!-- Paginator使用 -->
	<?= $this -> Paginator -> first('<<first'); ?>
	<?= $this -> Paginator -> prev('<prev'); ?>
	<?= $this -> Paginator -> numbers(); ?>
	<?= $this -> Paginator -> next('next>'); ?>
	<?= $this -> Paginator -> last('last>>'); ?>
</div>