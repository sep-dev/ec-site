<div>
	<h3>商品詳細: <?= h($tblitem -> itemName) ?></h3>
	<?= $this -> Form -> create() ?>
	<!-- 戻るボタン -->
	<?= $this -> Html -> link('Back', array(
			'controller' => 'ecsite', 'action' => 'shohinlist')) ?>
	<fieldset>
		<p><?= $this -> Html -> image('/image/' .$tblitem -> itemImg)?></p>
		<p><?= h($tblitem -> itemData) ?></p>
		<?php $selectnum = array();
			for($num = 1; $num <= 5; $num++) {
				array_push($selectnum, array(
						'value' => $num, 'text' => $num));
			} ?>
		<?= $this -> Form -> select('num', $selectnum) ?>
		<?= $this -> Html -> link('Cart', array(
				'controller' => 'Ecsite', 'action' => 'cart', $num)) ?>
	</fieldset>
	<?= $this -> Form -> submit('Cart', array(
				'controller' => 'Ecsite', 'action' => 'cart')) ?>
	<?= $this -> Form -> end() ?>
	<p>セッション格納情報</p>
	<?= h($sesId) ?>
	<?= h($sesImg) ?>
	<?= h($sesName) ?>
	<?= h($sesPrice) ?>
</div>