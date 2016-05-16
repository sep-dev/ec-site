<!DOCTYPE html>
<html>
<head>
	<title>お客様情報入力確認画面</title>
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
		<div id="contents" align="center">
			<table width="800" height="400" border="1" cellspacing="0"
				cellpadding="0">
				<caption>
					<font size="5">お客様情報</font>
				</caption>
				<tr align="center">
					<th colspan="2" bgcolor="#A4A4A4">メールアドレス</th>
					<td><?= ($adddata['clientMailAddress']) ?></td>
				</tr>
				<tr align="center">
					<th colspan="2" bgcolor="#A4A4A4">お名前</th>
					<td><?= ($adddata['clientName']) ?></td>
				</tr>
				<tr align="center">
					<th colspan="2" bgcolor="#A4A4A4">フリガナ</th>
					<td><?= ($adddata['clientKana']) ?></td>
				</tr>
				<tr align="center">
					<th colspan="2" bgcolor="#A4A4A4">性別</th>
					<td><?= ($adddata['clientSex']) ?></td>
				</tr>
				<tr align="center">
					<th colspan="2" bgcolor="#A4A4A4">生年月日</th>
					<td><?= ($adddata['clientBirthday']) ?></td>
				</tr>
				<tr align="center">
					<th colspan="2" bgcolor="#A4A4A4">郵便番号</th>
					<td><?= ($adddata['clientPostCode']) ?></td>
				</tr>
				<tr align="center">
					<th colspan="2" bgcolor="#A4A4A4">住所</th>
					<td><?= ($adddata['clientAdd']) ?></td>
				</tr>
				<tr align="center">
					<th colspan="2" bgcolor="#A4A4A4">お電話番号</th>
					<td><?= ($adddata['clientTel']) ?></td>
				</tr>
			</table>
			<br>
			<br>
			<div align="center">
				<button type="button" name="go_input">お客様情報入力画面に戻る</button>
				<br>
				<br>
				<button type="button" name="go_buy">この内容で登録する</button>
			</div>
		</div>
</body>
</html>