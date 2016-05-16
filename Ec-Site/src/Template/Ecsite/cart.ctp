<div>
	<h3>Cart</h3>
	<!-- 戻るボタン -->
	<?= $this -> Html -> link('Back', array(
			'controller' => 'ecsite', 'action' => 'shohinlist')) ?>
	<p>セッション格納情報</p>
		<?= h($sesId) ?>
		<?= h($sesImg) ?>
		<?= h($sesName) ?>
		<?= h($sesPrice) ?>
		<?= h($sesNum) ?>
	<!-- 続ける場合は、配列にセッション情報を格納 -->
	<?= $this -> Html -> link('続ける', array(
			'controller' => 'ecsite', 'action' => 'index')) ?>
</div>