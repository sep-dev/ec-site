【ご注文内容】

<?php $num=0;?>
<?php foreach ($item as $item):?>
・<?=$item['name']?>      <?=$item['num']?>点		<?=number_format($item['price'])?>円<?php $num+=$item['price']?>
<?php endforeach;?>

合計金額<?=number_format($num)?>円

【お客様情報】

名前:	<?= $adddata['clientName'] ?>

フリガナ:	<?= $adddata['clientName'] ?>

メールアドレス:		<?= $adddata['clientMailAddress'] ?>

郵便番号:	<?= $adddata['clientPostCode'] ?>

住所:	<?= $adddata['clientAdd'] ?>

電話番号:	<?= $adddata['clientTel'] ?>

性別:	<?= $adddata['clientSex'] ?>

<?php if ($adddata['clientBirthday'] != NULL) { ?>
生年月日:	<?= $adddata['clientBirthday'] ?>

<?php }; ?>
【お支払い方法】
・代金引換

************************************************************
泉水産
************************************************************