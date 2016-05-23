<div class="cart">
	<h3>Cart</h3>
	<?php if(count($cartitemlist) != 0): ?>
		<button><?= $this -> Html -> link('購入する', array(
			'controller' => 'ecsite', 'action' => 'inputdata')) ?></button>
		<button><?= $this -> Form -> postlink('カートを空にする', array(
			'controller' => 'ecsite', 'action' => 'cartempty'), array(
					'confirm' => 'Are you sure?')) ?></button>
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
						<td>&yen;<?= number_format(h($cartitem['num'] * $cartitem['price'])) ?></td>
						<?php $sum += ($cartitem['num'] * $cartitem['price']) ?>
						<td><?= $this -> Form -> postlink('Delete', array(
								'controller' => 'ecsite', 'action' => 'delete', $cartitem['id']), array(
										'confirm' => 'Are you sure?')) ?>
						</td>
				<?php endforeach; ?>
				<?php unset($cartitem); ?>
			</tbody>
		</table>
	<h4>合計金額 : &yen;<?= number_format($sum) ?></h4>
	<?php else: ?>
		<h3>Not Data.</h3>
	<?php endif; ?>
	<!-- 続ける場合は、配列にセッション情報を格納 -->
	<button><?= $this -> Html -> link('買い物を続ける', array(
			'controller' => 'ecsite', 'action' => 'categorylist', $sesCategoryid)) ?></button>
</div>