<!DOCTYPE html>
<html>
<head>
	<title>購入確認画面</title>
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
			<div align="center">
				<table width="800" height="80" border="1" cellspacing="0" cellpadding="0">
					<caption><font size="5">お支払い情報</font></caption>
		    		<tr bgcolor="#A4A4A4">
		     	 		<th align="center">商品名</th>
		     	 		<th>価格</th>
		  			    <th>数量</th>
		  			    <th>小計</th>
					</tr>
					<tr>
						<td class="cart_name" align="center">商品名</td>
						<td class="item" align="center">価格</td>
						<td class="item" align="center">数量</td>
						<td  class="subtotal" align="center">小計</td>
					</tr>
				</table>
				<br>
				<div align="center">
					<button type="button" name="go_cart">カート画面に戻る</button>
					<br><br>
				</div>
				<table width="800" height="400" border="1" cellspacing="0" cellpadding="0">
					<caption><font size="5">お客様情報</font></caption>
		 				<tr align="center">
		 					<th colspan="2" bgcolor="#A4A4A4">メールアドレス</th>
		 					<?php foreach ($clientdata as $clientdata):?>
		 					<td><?= h($clientdata->clientMailAddress) ?></td>
		 				</tr>
		 				<tr align="center">
		 					<th colspan="2" bgcolor="#A4A4A4">お名前</th>
		 					<td><?= h($clientdata->clientName) ?></td>
		 				</tr>
		 				<tr align="center">
		 					<th colspan="2" bgcolor="#A4A4A4">フリガナ</th>
		 					<td><?= h($clientdata->clientKana) ?></td>
		 				</tr>
		 				<tr align="center">
		 					<th colspan="2" bgcolor="#A4A4A4">性別</th>
		 					<td><?= h($clientdata->clientSex) ?></td>
		 				</tr>
		 				<tr align="center">
		 					<th colspan="2" bgcolor="#A4A4A4">生年月日</th>
		 					<td><?= h($clientdata->clientBirthday) ?></td>
		 				</tr>
		 				<tr align="center">
		 					<th colspan="2" bgcolor="#A4A4A4">郵便番号</th>
		 					<td><?= h($clientdata->clientPostCode) ?></td>
		 				</tr>
		 				<tr align="center">
		 					<th colspan="2" bgcolor="#A4A4A4">住所</th>
		 					<td><?= h($clientdata->clientAdd) ?></td>
		 				</tr>
		 				<tr align="center">
		 					<th colspan="2" bgcolor="#A4A4A4">お電話番号</th>
		 					<td><?= h($clientdata->clientTel) ?></td>
		 				</tr>
		 				<?php endforeach;?>
				</table>
				<br>
				<div align="center">
					<button type="button" name="go_input">お客様情報入力画面に戻る</button>
					<br><br>
					<button type="button" name="go_buy">この内容で確定する</button>
				</div>
			</div>
		</div>
	</body>
</html>
