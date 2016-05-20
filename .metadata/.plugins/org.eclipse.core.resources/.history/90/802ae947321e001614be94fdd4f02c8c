<div>
	<h3>商品詳細: <?= h($tblitem -> itemName) ?></h3>
	<?= $this -> Form -> create(null, array(
			'type' => 'post',
			'url' => array('controller' => 'ecsite', 'action' => 'cart')
	)) ?>
	<!-- 戻るボタン -->
	<?= $this -> Html -> link('Back', array(
			'controller' => 'ecsite', 'action' => 'categorylist', $sesCategoryid)) ?>
	<fieldset>
		<p><?= $this -> Html -> image('/image/' .$tblitem -> itemImg)?></p>
		<p><?= h($tblitem -> itemData) ?></p>
		<p><?= number_format($tblitem -> itemPrice) ?></p>
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