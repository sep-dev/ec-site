<?php

namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;
use Cake\Validation\Validation;

class EcsiteController extends AppController {



	public function cart() {
	}

	public $validate = array(
			'clientName' => array(
					'rule' => array('custom','/^[ぁ-んァ-ヶー一-龠]+$/i'),
					'notEmpty' => true
			),
			'clientPostCode' => array(
					'rule' => array('custom','/^\d{3}\-\d{4}$/'),
					'notEmpty' => true
			),
			'clientAdd' => array(
					'rule' => array('custom','/^[ぁ-んァ-ンーa-zA-Z0-9一-龠０-９\-\r]+/'),
					'notEmpty' => true
			),
			'clientTel' => array(
					'rule' => array('custom','0\d{1,4}\d{1,4}\d{4}'),
					'notEmpty' => true
			),
			'clientMailAddress' => array(
					'rule' => array('email',true),
					'notEmpty' => true
			),
			'clientSex' => array(
					'rule' => 'notEmpty'
			),
			'clientKana' => array(
					'rule' => array('custom','/^[ァ-ン]+/'),
					'notEmpty' => true
			),
			'clientBirthday' => array(
					'allowEmpty' => true
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
												"-".
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

						'clientBirthday'	=> $this->request->data['clientBirthyear'].
												"-".
												$this->request->data['clientBirthMonth'].
												"-".
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