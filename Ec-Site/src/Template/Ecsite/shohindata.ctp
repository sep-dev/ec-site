<div class="shohindata">
	<h3>商品詳細: <?= h($tblitem -> itemName) ?></h3>
	<!-- 戻るボタン -->
	<button><?= $this -> Html -> link('Back', $_SERVER['HTTP_REFERER']); ?></button>

	<?= $this -> Form -> create(null, array(
			'type' => 'post',
			'url' => array('controller' => 'ecsite', 'action' => 'cart')
	)) ?>
	<fieldset>
		<p><?= $this -> Html -> image('/image/' .$tblitem -> itemImg)?></p>
		<p><?= h($tblitem -> itemData) ?></p>
		<p>&yen;<?= number_format($tblitem -> itemPrice) ?></p>
		<?php $selectnum = array();
			for($num = 1; $num <= 5; $num++) {
				array_push($selectnum, array(
						'value' => $num, 'text' => $num));
			} ?>
		<?= $this -> Form -> select('select', $selectnum) ?>
	</fieldset>
	<?= $this -> Form -> submit('Cart') ?>
	<?= $this -> Form -> end() ?>
</div>
