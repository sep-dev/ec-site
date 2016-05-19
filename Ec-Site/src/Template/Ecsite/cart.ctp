<div>
	<h3>Cart</h3>
	<table>
		<thead>
			<tr>
				<th>Name</th>
				<th>Image</th>
				<th>Num</th>
				<th>Price</th>
			<tr>
		</thead>
		<tbody>
			<tr>
				<td><?= h($sesName) ?></td>
				<td><?= $this -> Html -> image('/image/' . $sesImg) ?></td>
				<td><?= h($sesNum) ?></td>
				<td>&yen;<?= h($sesNum * $sesPrice) ?></td>
			<tr>
		</tbody>
	</table>
	<!-- 続ける場合は、配列にセッション情報を格納 -->
	<?= $this -> Html -> link('続ける', array(
			'controller' => 'ecsite', 'action' => 'categorylist', $sesCategoryid)) ?>
>>>>>>> ddb532eae4d75637727df804ceadcbc51ea7eb76
</div>