<?= $this->Form->create(null,array('type'=>'post'))?>
<?= $this->Html->script("https://ajaxzip3.github.io/ajaxzip3.js") ?>
	<div>
		<br> <br>
		<div align="center">
			<div align="center">
				<!-- お客様情報入力↓ここから-->
				<table width="1000" height="400" border="1" cellspacing="0"cellpadding="0">
					<caption>
						<font size="5">お客様情報入力画面</font>
						<p align="right">
							<span>※</span>は必須項目です。
						</p>
					</caption>
					<tr align="center">
						<th colspan="2" bgcolor="#A4A4A4"><div>
								メールアドレス<span>※</span>
							</div></th>
						<td>
						<?= $this->Form->input('clientMailAddress1',array('size'=>'70'
								,'maxlength'=>'80','label'=>false)) ?>
						</td>
					</tr>
					<tr align="center">
						<th colspan="2" bgcolor="#A4A4A4"><div>
								メールアドレス(確認用)<span>※</span>
							</div></th>
						<td>
							<?= $this->Form->input('clientMailAddress2',array('size'=>'70'
								,'maxlength'=>'80','label'=>false)) ?>
						</td>
					</tr>
					<tr align="center">
						<th colspan="2" bgcolor="#A4A4A4"><div>
								お名前<span>※</span>
							</div></th>
						<td>
							姓<?= $this->Form->input('clientName1',array('size'=>'20'
								,'maxlength'=>'80','label'=>false)) ?>
							名<?= $this->Form->input('clientName2',array('size'=>'20'
								,'maxlength'=>'80','label'=>false)) ?>
						</td>
					</tr>
					<tr align="center">
						<th colspan="2" bgcolor="#A4A4A4"><div>
								フリガナ<span>※</span>
							</div></th>
						<td>
							セイ<?= $this->Form->input('clientKana1',array('maxlength'=>'40'
								,'label'=>false)) ?>
							メイ<?= $this->Form->input('clientKana2',array('maxlength'=>'40'
									,'label'=>false)) ?>
						</td>
					</tr>
					<tr align="center">
						<th colspan="2" bgcolor="#A4A4A4"><div>
								性別<span>※</span>
							</div></th>
						<td>
							<?= $this->Form->radio('clientSex',array(array('value'=>'男性','text'=>'男性'),
													array('value'=>'女性','text'=>'女性'))) ?>
						</td>
					</tr>
					<tr align="center">
						<th colspan="2" bgcolor="#A4A4A4"><div>生年月日</div></th>
						<td>
							<?php
								$selectYear = array();
								for( $year=1917; $year <= 2016; $year++) {
									array_push($selectYear,array('value'=>$year,'text'=>$year));
								}
							?>
							<?=$this->Form->select('clientBirthyear',array($selectYear))?>年
							<?php
								$selectMonth = array();
								for ( $month=1; $month <= 12; $month++) {
									array_push($selectMonth,array('value'=>$month,'text'=>$month));
								}
							?>
							<?=$this->Form->select('clientBirthMonth',array($selectMonth))?>月
							<?php
								$selectDay = array();
								for( $day=1; $day <= 31; $day++) {
									array_push($selectDay,array('value'=>$day,'text'=>$day));
								}
							?>
							<?=$this->Form->select('clientBirthday',array($selectDay))?>日</td>
					</tr>
					<tr align="center">
						<th rowspan="4" bgcolor="#A4A4A4"><div>
								住所<span>※</span>
							</div></th>
						<th><div>
								郵便番号<span>※</span>
							</div></th>
						<td>
							<?= $this->Form->input('clientPostCode1',array('maxlength'=>'3','size'=>'6'
								,'label'=>false,'before')) ?>
							-
							<?= $this->Form->input('clientPostCode2',array('maxlength'=>'4','size'=>'8'
								,'label'=>false,'div'=>false)) ?>
							<button type="button" name="addAdd" value="自動住所入力"onClick="AjaxZip3.zip2addr
								('clientPostCode1','clientPostCode2','clientAdd1','clientAdd2');">自動住所入力</button>
						</td>
					</tr>
					<tr align="center">
						<th><div>
								都道府県<span>※</span>
							</div>
						</th>
						<td>
							<!-- ken.phpの変数kenの都道府県データの取得  -->
							<?php
								require_once(dirname(__FILE__) . '/ken.php');
							?>
							<?= $this->Form->select('clientAdd1',$ken)?>
						</td>
					</tr>
					<tr align="center">
						<th class="small"><div>
								市区町村番地<span>※</span>
							</div></th>
						<td>
							<?= $this->Form->input('clientAdd2',array('maxlength'=>'40','size'=>'30'
									,'label'=>false)) ?>
						</td>
					</tr>
					<tr align="center">
						<th class="small"><div>
								電話番号<span>※</span>
							</div></th>
						<td>
							<?= $this->Form->input('clientTel1',array('maxlength'=>'4','size'=>'4'
									,'label'=>false)) ?>
							-
							<?= $this->Form->input('clientTel2',array('maxlength'=>'4','size'=>'4'
									,'label'=>false)) ?>
							-
							<?= $this->Form->input('clientTel3',array('maxlength'=>'4','size'=>'4'
									,'label'=>false)) ?>
						</td>
					</tr>
				</table>
				<!-- お客様情報入力ここまで↑ -->
				<br>

				<?= $this->Form->button('カートに戻る',array('formaction'=>'cart')) ?>
				<?= $this->Form->button('入力情報の確認') ?>
				<?php

					if(!empty($errormail)){
						echo ("<h2 ><font color=\"red\">$errormail</font></h2>");
					}

					if(!empty($error)){
						foreach ($error as $key => $value){
							foreach ($value as $value){
								echo ("<h2 ><font color=\"red\">$value</font></h2>");
							}
						}
					}
				?>
			</div>
		</div>
	</div>
