<div>
	<h3>Cart</h3>
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
				<td><?= h($cartitemlist['sesPrice']) ?></td>
				<td><?= $this -> Form -> postlink('Delete', array(
						'controller' => 'ecsite', 'action' => 'delete'), array(
								'confirm' => 'Are you sure?')) ?>
				</td>
			<tr>
		<?php endforeach; ?>
		</tbody>
	</table>
	<!-- 続ける場合は、配列にセッション情報を格納 -->
	<?= $this -> Html -> link('続ける', array(
			'controller' => 'ecsite', 'action' => 'categorylist', $sesCategoryid)) ?>
</div>