<div>
	<h3>商品詳細: <?= h($tblitem -> itemName) ?></h3>
	<?= $this -> Form -> create() ?>
	<!-- 戻るボタン -->
	<?= $this -> Html -> link('Back', array(
			'controller' => 'ecsite', 'action' => 'shohinlist')) ?>
	<fieldset>
		<p><?= $this -> Html -> image('/image/' .$tblitem -> itemImg)?></p>
		<p><?= h($tblitem -> itemData) ?></p>
		<?= $this -> Html -> link('Cart', array(
				'controller' => 'Ecsite', 'action' => 'cart')) ?>
	</fieldset>
	<p>セッション格納情報</p>
	<?= h($sesId) ?>
	<?= h($sesImg) ?>
	<?= h($sesName) ?>
	<?= h($sesPrice) ?>
</div>