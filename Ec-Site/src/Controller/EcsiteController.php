<?php

namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;

class EcsiteController extends AppController {



	public function cart() {
	}

	public $validate = array(
			'clientName' => array(
					'rule' => 'notEmpty',
					'message'=>'名前を入力してください'
			)
	);

	public function initialize() {
// 		parent::initialize();
// 		//tblclientテーブルの参照
		$this-> tblClient = TableRegistry::get('tblclient');
	}

	public function inputdata() {

		//postデータが有るかの判断
		if($this->request->is('post')&&isset($this->request->data)) {
				//メールアドレスが確認用と同じかを判断
				if ($this->request->data['clientMailAddress1']==$this->request->data['clientMailAddress2']) {
				//入力データを登録できる型に変換
					$adddata = array(
						'clientName'		=>	$this->request->data['clientName1'].
												$this->request->data['clientName2'],

						'clientPostCode'	=>	$this->request->data['clientPostCode1'].
												$this->request->data['clientPostCode2'],

						'clientAdd' 		=>	$this->request->data['clientAdd1'].
												$this->request->data['clientAdd2'],

						'clientTel'			=>	$this->request->data['clientTel1'].
												$this->request->data['clientTel2'].
												$this->request->data['clientTel3'],

						'clientMailAddress'	=>	$this->request->data['clientMailAddress1'],

						'clientSex' 		=>	$this->request->data['clientSex'],

						'clientKana' 		=>	$this->request->data['clientKana1'].
												$this->request->data['clientKana2'],

						'clientBirthday'	=> $this->request->data['clientBirthyear']."-".
												$this->request->data['clientBirthMonth']."-".
												$this->request->data['clientBirthday']
		 			);

					//tblclientに登録するための変数宣言
					$tbl = $this->tblClient->newEntity();
					$tbl = $this->tblClient->patchEntity($tbl,$adddata);

					if($this->tblClient->save($tbl)) {
						//確認ページに遷移
						return $this->redirect(array('action'=>'input_kakunin'));
					} else {
						//エラー表示
						$this->set('error','入力データが不正です!!!!!');
					}

			} else {
				//エラー表示
				$this->set('error','メールアドレスが一致しません！！！！');
			}

		}
	}
}