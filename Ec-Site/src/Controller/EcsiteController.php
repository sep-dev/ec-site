<?php

namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;
use Cake\Validation\Validation;
use App\Model\Entity\Tblclient;
use App\Model\Table\TblclientTable;
use Cake\Validation\Validator;
use PhpParser\Node\Stmt\ElseIf_;

class EcsiteController extends AppController {


	public function cart() {
	}

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

						'clientTel'			=>	$this->request->data['clientTel1']."-".
												$this->request->data['clientTel2']."-".
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

					$validate = $this->tblClient->newEntity($adddata);
					if(!$validate->errors()) {

					} else {
						$errors = $validate->errors();
						$this->set('error',$errors);
					}

				} else {
					//エラー表示
					$this->set('errormail','メールアドレスが一致しません！！！！');
				}
		}
	}

	public function inputkakunin(){

					$adddata = array(
						'clientName'		=>	$this->request->data['clientName1'].
												$this->request->data['clientName2'],

						'clientPostCode'	=>	$this->request->data['clientPostCode1'].
												"-".
												$this->request->data['clientPostCode2'],

						'clientAdd' 		=>	$this->request->data['clientAdd1'].
												$this->request->data['clientAdd2'],

						'clientTel'			=>	$this->request->data['clientTel1']."-".
												$this->request->data['clientTel2']."-".
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

					$this->set('adddata',$adddata);

	}
}