【ご注文内容】
<?php $sum = 0;?>
<?php foreach ($cartitemlist as $cartitem): ?>

・<?=h($cartitem['name'])?>		<?= h($cartitem['num']) ?>点	<?= number_format(h($cartitem['num'] * $cartitem['price'])) ?>円
<?php  $sum += ($cartitem['num'] * $cartitem['price'])?>

<?php endforeach;?>

合計金額:<?= number_format($sum) ?>円


以上の商品ご購入ありがとうございます。

【お支払い方法】
・代金引換

************************************************************
泉水産
************************************************************