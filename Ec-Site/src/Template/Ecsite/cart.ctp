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
			<?php foreach($cartitemlist as $cartitemlist): ?>
				<tr>
					<td><?= h($cartitemlist['sesName']) ?></td>
					<td><?= $this -> Html -> image('/image/' .$cartitemlist['sesImg']) ?></td>
					<td><?= h($cartitemlist['sesNum']) ?></td>
					<td>&yen;<?= h($cartitemlist['sesPrice']) ?></td>
					<td><?= $this -> Form -> postlink('Delete', array(
							'controller' => 'ecsite', 'action' => 'delete', $cartitemlist['sesId']), array(
									'confirm' => 'Are you sure?')) ?>
					</td>
					<?php echo $cartitemlist['sesId'] ?>
				<tr>
			<?php endforeach; ?>
		</tbody>
	</table>
	<?= $this -> Form -> postlink('allDelete', array(
						'controller' => 'ecsite', 'action' => 'alldelete')) ?>
	<?php else: ?>
		<h3>Not Data.</h3>
	<?php endif; ?>
	<!-- 続ける場合は、配列にセッション情報を格納 -->
	<?= $this -> Html -> link('続ける', array(
			'controller' => 'ecsite', 'action' => 'categorylist', $sesCategoryid)) ?>
</div>