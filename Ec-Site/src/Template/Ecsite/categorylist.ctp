<div class="contents">
	<div class="list">
		<h3>カテゴリー別一覧</h3>
		<?= $this -> Form -> create() ?>

		<!-- 検索機能 -->
		<fieldset>
			<?= $this -> Form -> input('find') ?>
			<?= $this -> Form -> button('Find') ?>
		</fieldset>

	<div class="back">
		<!-- 戻るボタン -->
		<button><?= $this -> Html -> link('Back', array(
				'controller' => 'ecsite', 'action' => 'index')) ?>
		</button>
	</div>
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
		<!-- $tblitem配列をループして、商品リストの情報を表示 -->
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
					<td>&yen;<?= $tblitem -> itemPrice ?></td>
				<tr>
			<?php endforeach; ?>
			</tbody>
		</table>
		<!-- Paginator使用(5件表示) -->
		<div class="paginator">
			<?= $this -> Paginator -> first('<<First'); ?>
			<?= $this -> Paginator -> prev('<Prev'); ?>
			<?= $this -> Paginator -> numbers(); ?>
			<?= $this -> Paginator -> next('Next>'); ?>
			<?= $this -> Paginator -> last('Last>>'); ?>
		</div>
	</div>
</div>