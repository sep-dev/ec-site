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
		<?php foreach ($tblcategory as $tblcategory): ?>
			<tr>
				<td><?= h($tblcategory -> categoryId) ?></td>
				<td><?= $this -> Html -> link($tblcategory -> categoryName, array(
					'controller' => 'ecsite', 'action' => 'shohinlist2', $tblcategory -> categoryId)) ?></td>
			<tr>
		<?php endforeach; ?>
		</tbody>
	</table>
</div>