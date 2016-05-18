<div>
	<h3>Cart</h3>
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
						<td>
						<?php $selectnum = array();
							for($num = 1; $num <= 5; $num++) {
								if($num == $cartitem['num']) {
									array_push($selectnum, array(
											'value' => $num, 'text' => $num, 'selected' => true));
								}
								else {
									array_push($selectnum, array(
										'value' => $num, 'text' => $num));
								}
						} ?>
						<?= $this -> Form -> select('select', $selectnum, array('onchange' => 'change()')) ?></td>
						<td>&yen;<?= number_format(h($cartitem['num'] * $cartitem['price'])) ?></td>
						<?php $sum += ($cartitem['num'] * $cartitem['price']) ?>
						<td><?= $this -> Form -> postlink('Delete', array(
								'controller' => 'ecsite', 'action' => 'delete', $cartitem['id']), array(
										'confirm' => 'Are you sure?')) ?>
						</td>
					<tr>
				<?php endforeach; ?>
			</tbody>
		</table>
	<h4>合計金額 : &yen;<?= number_format($sum) ?></h4>
	<?= $this -> Form -> postlink('allDelete', array(
						'controller' => 'ecsite', 'action' => 'alldelete')) ?>
	<?php else: ?>
		<h3>Not Data.</h3>
	<?php endif; ?>
	<!-- 続ける場合は、配列にセッション情報を格納 -->
	<p><?= $this -> Html -> link('続ける', array(
			'controller' => 'ecsite', 'action' => 'categorylist', $sesCategoryid)) ?></p>
	<p><?= $this -> Html -> link('Buy in the Cart', array(
			'controller' => 'ecsite', 'action' => 'xxx')) ?></p>
	<p><?= $this -> Form -> postlink('再計算', array(
			'controller' => 'ecsite', 'action' => 'recal'))?></p>
</div>