<div>
	<h3>商品一覧</h3>
	<!-- 検索機能 -->
	<fieldset>
		<?= $this -> Form -> input('find') ?>
		<?= $this -> Form -> button('Find') ?>
	</fieldset>

	<!-- 戻るボタン -->
	<?= $this -> Html -> link('Back', array(
			'controller' => 'ecsite', 'action' => 'index')) ?>
	<!-- カテゴリ別予想 -->
	<table>
		<tr>
			<th>Name</th>
			<th>Image</th>
			<th>Data</th>
			<th>Price</th>
		</tr>
		<?php foreach ($tblitem as $tblitem): ?>
		<tr>
			<td><?= $tblitem -> itemName ?></td>
			<td>
			<!-- 画像リンク -->
			<?= $this -> Html -> link($this -> Html -> image('/image/' . $tblitem -> itemImg), array(
					'controller' => 'ecsite', 'action' => 'shohindata', $tblitem -> itemId), array(
							'escape' => false)) ?>
			</td>
			<td><?= $tblitem -> itemData ?></td>
			<td><?= $tblitem -> itemPrice ?></td>
		</tr>
		<?php endforeach; ?>
	</table>
	<!-- Paginator使用(5件表示) -->
	<?= $this -> Paginator -> first('<<first'); ?>
	<?= $this -> Paginator -> prev('<prev'); ?>
	<?= $this -> Paginator -> numbers(); ?>
	<?= $this -> Paginator -> next('next>'); ?>
	<?= $this -> Paginator -> last('last>>'); ?>
</div>