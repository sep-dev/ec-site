<div>
	<h3>商品詳細: <?= h($tblitem -> itemName) ?></h3>

	<!-- 戻るボタン -->
	<?= $this -> Html -> link('Back', array(
			'controller' => 'ecsite', 'action' => 'shohinlist')) ?>

	<p><?= $this -> Html -> image('/image/' .$tblitem -> itemImg)?></p>
	<p><?= h($tblitem -> itemData) ?></p>
</div>