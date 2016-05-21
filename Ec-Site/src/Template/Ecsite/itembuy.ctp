<!DOCTYPE html>
<html>
	<head>
		<title>購入完了画面</title>
		<meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
		<meta http-equiv="content-script-type" content="text/javascript; charset=UTF-8" />
		<meta http-equiv="content-style-type" content="text/css; charset=UTF-8" />
		<meta http-equiv="content-language" content="ja" />
		<meta name="Keywords" content="泉水産,オンラインショップ,ショップ,食品,海産物,魚,甲殻類,通販" />
		<meta name="Description" content="泉水産 オンラインショップ - 泉水産ローカル通販サイト" />
		<link rel="stylesheet" type="text/css" href="css/style.css">
		<link rel="stylesheet" type="text/css" href="css/css.css">
	</head>
	<body>
	<div class="content">
		<?= $this->Form->create(null,array('type'=>'post'))?>
		<div align="center">
			<h1>ご購入完了しました！！</h1>
			<h2>ご購入情報につきましてはお客様にメールで詳細をお送りいたしました</h2>
			<?= $this->Form->button('ホームに戻る',array('formaction'=>'index')) ?>
		</div>
	</div>
	</body>
</html>