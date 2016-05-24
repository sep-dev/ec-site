<?= $adddata['clientName'] ?>様
本日はご注文ありがとうございました。

【ご注文内容】
<?php $sum=0;?>
<?php foreach ($item as $item):?>
・<?=$item['name']?>      <?=$item['num']?>点		<?=number_format($item['price']*$item['num'])?>円
<?php $sum+=$item['price']*$item['num']?>
<?php endforeach;?>

合計金額<?=number_format($sum)?>円

以上の商品ご購入ありがとうございます。

【お支払い方法】
・代金引換

************************************************************
泉水産
************************************************************