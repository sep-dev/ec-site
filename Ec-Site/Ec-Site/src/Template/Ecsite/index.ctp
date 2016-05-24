
<!DOCTYPE html>
<html>
	<div class="top_page">
		<div class="osusume">
			<h2>おすすめ商品</h2>
			<?php foreach ($tblitem as $tblitem):?>
			<div class="osusume_nakami">
				<?= $this -> Html -> link($this -> Html -> image('/image/' . $tblitem -> itemImg), array(
					'controller' => 'ecsite', 'action' => 'shohindata', $tblitem -> itemId), array(
							'escape' => false)) ?>
				<p><?=$tblitem->itemName?>				&yen;<?=number_format($tblitem -> itemPrice)?></p>
			</div>
			<?php endforeach;?>
		</div>

		<div class="new">
			<h2>新着商品</h2>
			<?php foreach ($newitem as $newitem):?>
			<div class="new_nakami">
				<?= $this -> Html -> link($this -> Html -> image('/image/' . $newitem -> itemImg), array(
					'controller' => 'ecsite', 'action' => 'shohindata', $newitem -> itemId), array(
							'escape' => false)) ?>
				<p><?=$newitem->itemName?>				&yen;<?=number_format($newitem -> itemPrice)?></p>
			</div>
			<?php endforeach;?>
		</div>


	</div>
		<div class="news">
			<h3>おしらせ</h3>
			 <ul>
				 <li><time datatime="2016-05-31">05/31</time>
					泉水産オフィシャルショップサイト開設しました！！</li>
				 <li><time datatime="2016-06-01">06/01</time>
					 期間限定！父の日商品の販売を開始しました！</li>
				 <li><time datatime="2016-06-02">06/02</time>
				 	商品の発送は日本全国10日以内にお届けいたします！</li>
			 </ul>
		</div>



