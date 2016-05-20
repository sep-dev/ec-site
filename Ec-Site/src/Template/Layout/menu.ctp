<!DOCTYPE html>
<html lang="ja">
	<head>
		<meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
		<meta http-equiv="content-script-type" content="text/javascript; charset=UTF-8" />
			<meta http-equiv="content-language" content="ja" />
		<link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css" rel="stylesheet">
		<meta name="Keywords" content="泉水産,オンラインショップ,ショップ,食品,海産物,魚,甲殻類,通販" />
		<meta name="Description" content="泉水産 オンラインショップ - 泉水産ローカル通販サイト" />

	<?php
		echo $this->Html->css('style.css');
		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
	?>

	<title>IZUMI SUISAN SHOP ONLINE</title>
</head>
<body>

<div class="contaner">

		<!-- //headerここから▽ -->
		<div class="header">
			<div class="rogo">
				<?= $this -> Html -> link($this -> Html -> image('/img/title_logo.jpg', array(
						'width' => '485', 'height' => '75')), array(
							'controller' => 'ecsite', 'action' => 'index'), array(
								'escape' => false)) ?>
				<?= $this -> Html -> link('泉水産オフィシャルショップ', array(
						'controller' => 'ecsite', 'action' => 'index')) ?>
			</div>
			<div class="header_box">
				<div class="btn_watch"><i class="fa fa-shopping-cart" aria-hidden="true"></i><?= $this -> Html -> link('カートの中を見る', array(
						'controller' => 'ecsite', 'action' => 'cart')) ?></div>
					<p><i class="fa fa-home" aria-hidden="true"></i><?= $this -> Html -> link('HOME', array(
						'controller' => 'ecsite', 'action' => 'index')) ?></p>
				</div>
			</div>
		<!-- //headerここまで△ -->

		<!-- //side_menuここから▽ -->
			<div class="side_menu">
				<ul>
					<li>商品一覧</li>
					<?php foreach($tblcategory as $tblcategory): ?>
					<li><?= $this -> Html -> link($this -> Html -> image('/img/' . $tblcategory -> categoryImg), array(
							'controller' => 'ecsite', 'action' => 'categorylist', $tblcategory -> categoryId), array(
								'escape' => false)) ?></li>
					<?php endforeach; ?>
				</ul>
			</div>
		<!-- //side_menuここまで△ -->

		<?= $this->fetch('content') ?>

		<!-- //footerここから▽ -->
			<div class="footer">
				<p class="home_link"><a onclick="location.href='http://localhost/ec-site/Ec-Site/Ecsite'">HOME</a></p>
				<br>
				<p>&copy; IZUMI SUISAN CO.,LTD. ALL Right Reserved. &copy; IZUMI-SUISAN</p>
			</div>
		<!-- //footerここまで△ -->
</div>

</body>

</html>