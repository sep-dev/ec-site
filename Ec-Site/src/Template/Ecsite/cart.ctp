<div>
	<h3>Cart</h3>
	<?= $this -> Form -> create() ?>
	<fieldset>
		<?php if(count($cartitemlist) != 0): ?>
		<table>
			<thead>
				<tr>
					<th>Name</th>
					<th>Image</th>
					<th>Num</th>
					<th>Price</th>
					<th>Action</th>
				<tr>
			</thead>
			<tbody>
				<?php $sum = 0; ?>
				<?php foreach($cartitemlist as $cartitem): ?>
					<tr>
						<td><?= h($cartitem['name']) ?></td>
						<td><?= $this -> Html -> image('/image/' .$cartitem['img']) ?></td>
						<td><?= h($cartitem['num']) ?></td>
						<td>&yen;<?= h($cartitem['num'] * $cartitem['price']) ?></td>
						<?php $sum += ($cartitem['num'] * $cartitem['price']) ?>
						<td><?= $this -> Form -> postlink('Delete', array(
								'controller' => 'ecsite', 'action' => 'delete', $cartitem['id']), array(
										'confirm' => 'Are you sure?')) ?>
						</td>
					<tr>
				<?php endforeach; ?>
			</tbody>
		</table>
	</fieldset>
	<h4>合計金額 : &yen;<?= $sum ?></h4>
	<?= $this -> Form -> postlink('allDelete', array(
						'controller' => 'ecsite', 'action' => 'alldelete')) ?>
	<?php else: ?>
		<h3>Not Data.</h3>
	<?php endif; ?>
	<!-- 続ける場合は、配列にセッション情報を格納 -->
	<?= $this -> Html -> link('続ける', array(
			'controller' => 'ecsite', 'action' => 'categorylist', $sesCategoryid)) ?>
	<?= $this -> Form -> button('Buy in the Cart')?>
	<?= $this -> Form -> end() ?>
</div>