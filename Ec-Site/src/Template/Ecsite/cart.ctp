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
</div>