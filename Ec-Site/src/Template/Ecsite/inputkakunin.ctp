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
	<?= $this->Form->create(null,array('type'=>'post'))?>
		<div id="contents" align="center">
			<table width="800" height="400" border="1" cellspacing="0"
				cellpadding="0">
				<caption>
					<font size="5">お客様情報</font>
				</caption>
				<tr align="center">
					<th colspan="2" bgcolor="#A4A4A4">メールアドレス</th>
					<td><?= ($adddata['clientMailAddress1'])?>
						<?= $this->Form->hidden('clientMailAddress' ,
								array('value' => ($adddata['clientMailAddress1'])));?></td>
				</tr>
				<tr align="center">
					<th colspan="2" bgcolor="#A4A4A4">お名前</th>
					<td><?= ($adddata['clientName1']),($adddata['clientName1']) ?>
						<?= $this->Form->hidden('clientName' ,
								array('value' => ($adddata['clientName1']).($adddata['clientName2'])));?></td>
				</tr>
				<tr align="center">
					<th colspan="2" bgcolor="#A4A4A4">フリガナ</th>
					<td><?= ($adddata['clientKana1']),($adddata['clientKana2']) ?>
						<?= $this->Form->hidden('clientKana' ,
								array('value' => ($adddata['clientKana1']).($adddata['clientKana2'])));?></td>
				</tr>
				<tr align="center">
					<th colspan="2" bgcolor="#A4A4A4">性別</th>
					<td><?= ($adddata['clientSex']) ?>
						<?= $this->Form->hidden('clientSex' ,
								array('value' => ($adddata['clientSex'])));?></td>
				</tr>
				<tr align="center">
					<th colspan="2" bgcolor="#A4A4A4">生年月日</th>
					<td><?= ($adddata['clientBirthyear']),"年",($adddata['clientBirthMonth']),"月",
								($adddata['clientBirthday']),"日"?>
						<?= $this->Form->hidden('clientBirthday' ,
								array('value' =>($adddata['clientBirthyear'])."年".($adddata['clientBirthMonth'])."月".
								($adddata['clientBirthday'])."日"))?></td>
				</tr>
				<tr align="center">
					<th colspan="2" bgcolor="#A4A4A4">郵便番号</th>
					<td><?= ($adddata['clientPostCode1']),"-",($adddata['clientPostCode2']) ?>
						<?= $this->Form->hidden('clientPostCode' ,
								array('value' => ($adddata['clientPostCode1'])."-".($adddata['clientPostCode2'])));?></td>
				</tr>
				<tr align="center">
					<th colspan="2" bgcolor="#A4A4A4">住所</th>
					<td><?= ($adddata['clientAdd1']),($adddata['clientAdd2']) ?>
						<?= $this->Form->hidden('clientAdd' ,
								array('value' => ($adddata['clientAdd1'])."県".($adddata['clientAdd2'])));?></td>
				</tr>
				<tr align="center">
					<th colspan="2" bgcolor="#A4A4A4">お電話番号</th>
					<td><?= ($adddata['clientTel1']),"-",($adddata['clientTel2']),"-",
							($adddata['clientTel3'])?>
						<?= $this->Form->hidden('clientTel' ,
								array('value' =>  ($adddata['clientTel1'])."-".($adddata['clientTel2'])."-".
													($adddata['clientTel3'])));?></td>
				</tr>
			</table>
			<br>
			<br>
			<div align="center">
				<?= $this->Form->button('お客様情報入力画面に戻る',array('formaction'=>'inputdata')) ?>
				<br>
				<br>
				<?= $this->Form->button('この内容で登録する') ?>
			</div>
		</div>
</body>
</html>