<div>
	<?= $this->Form->create(null,array('type'=>'post'))?>
	<div class="item_buy">
		<h1>ご購入完了しました！！</h1>
		<h2>ご購入情報につきましてはお客様にメールで詳細をお送りいたしました</h2>
		<?= $this->Form->button('ホームに戻る',array('formaction'=>'index')) ?>
	</div>
</div>