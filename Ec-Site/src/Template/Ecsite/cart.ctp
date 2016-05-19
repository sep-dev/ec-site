<div>
	<!-- カート一覧ここから↓ -->
	<table width="800" border="1" cellspacing="0" cellpadding="0">
		<caption><font size="5">ショッピングカート商品一覧</font></caption>
		<thead>
			<tr bgcolor="#A4A4A4">
				<th align="center">商品画像</th>
				<th>商品数</th>
				<th>数量</th>
				<th>価格</th>
				<th>商品計</th>
				<th>削除</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td align="center">商品画像</td>
				<td align="center">商品名</td>
				<td align="center">
					<!-- 数量選択セレクトボックスここから↓ -->
					<?= $this->Form->select('itemcount',array(
							array('value'=>'1','text'=>'1'),
							array('value'=>'2','text'=>'2'),
							array('value'=>'3','text'=>'3'),
							array('value'=>'4','text'=>'4'),
							array('value'=>'5','text'=>'5'),
					))?>
					<!-- 数量選択セレクトボックスここまで↑ -->
				</td>
				<td align="center">商品の価格</td>
				<td align="center">商品の価格×数量</td>
				<td align="center">
					<?= $this->Form->button('削除') ?>
				</td>
			</tr>
		</tbody>
	</table>
	<!-- カート一覧ここまで↑ -->
	<?= $this->Form->button('買い物を続ける') ?>
	<?= $this->Form->button('購入手続きに進む')?>
	<h3>Cart</h3>
	<?php if(count($cartitemlist) != 0): ?>
	<?= $this -> Form -> postlink('カートを空にする', array(
			'controller' => 'ecsite', 'action' => 'cartempty'), array(
					'confirm' => 'Are you sure?')) ?>
		<table>
			<thead>
				<tr>
					<th>Name</th>
					<th>Image</th>
					<th>Num</th>
					<th>Price</th>
					<th>Action</th>
				<tr>
			</thead>
			<tbody>
				<?php $sum = 0; ?>
				<?php foreach($cartitemlist as $cartitem): ?>
					<tr>
						<td><?= h($cartitem['name']) ?></td>
						<td><?= $this -> Html -> image('/image/' .$cartitem['img']) ?></td>
						<td><?= h($cartitem['num']) ?></td>
						<td>&yen;<?= number_format(h($cartitem['num'] * $cartitem['price'])) ?></td>
						<?php $sum += ($cartitem['num'] * $cartitem['price']) ?>
						<td><?= $this -> Form -> postlink('Delete', array(
								'controller' => 'ecsite', 'action' => 'delete', $cartitem['id']), array(
										'confirm' => 'Are you sure?')) ?>
						</td>
				<?php endforeach; ?>
				<?php unset($cartitem); ?>
			</tbody>
		</table>
	<h4>合計金額 : &yen;<?= number_format($sum) ?></h4>
	<?php else: ?>
		<h3>Not Data.</h3>
	<?php endif; ?>
	<!-- 続ける場合は、配列にセッション情報を格納 -->
	<?= $this -> Html -> link('続ける', array(
			'controller' => 'ecsite', 'action' => 'categorylist', $sesCategoryid)) ?>
	<p><?= $this -> Html -> link('買い物を続ける', array(
			'controller' => 'ecsite', 'action' => 'categorylist', $sesCategoryid)) ?></p>
	<p><?= $this -> Html -> link('購入する', array(
			'controller' => 'ecsite', 'action' => 'inputdata')) ?></p>
</div>