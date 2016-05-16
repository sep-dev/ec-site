<div>
	<h3>商品一覧</h3>
	<table>
		<thead>
			<tr>
				<th>CategoryID</th>
				<th>CategoryName</th>
			<tr>
		<thead>
		<tbody>
			<tr>
				<td>0</td>
				<td><?= $this -> Html -> link('全リスト', array(
						'controller' => 'ecsite', 'action' => 'shohinlist')) ?></td>
			<tr>
		<?php foreach ($tblcategory as $tblcategory): ?>
			<tr>
				<td><?= h($tblcategory -> categoryId) ?></td>
				<td><?= $this -> Html -> link($tblcategory -> categoryName, array(
					'controller' => 'ecsite', 'action' => 'categorylist', $tblcategory -> categoryId)) ?></td>
			<tr>
		<?php endforeach; ?>
		</tbody>
	</table>
</div>