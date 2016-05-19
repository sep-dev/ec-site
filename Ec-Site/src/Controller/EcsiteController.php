<?php

namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;
use Cake\Validation\Validation;
use App\Model\Entity\Tblclient;
use App\Model\Table\TblclientTable;
use Cake\Validation\Validator;
use PhpParser\Node\Stmt\ElseIf_;
use Cake\Test\Fixture\ThingsFixture;
use Cake\Network\Email\Email;

class EcsiteController extends AppController {

	public $paginate = array(
			'limit' => 5
	);

	public $helpers = array(
			'Paginator' => array(
					'templates' => 'paginator-templates'
			)
	);

	public function initialize() {
		parent::initialize();
		$this->Session = $this->request->session();
		$this -> loadComponent('Paginator');
		// 参照テーブルを設定
		$this -> tblItem = TableRegistry::get('tblitem');
		$this -> tblCategory = TableRegistry::get('tblcategory');
		$this-> tblClient = TableRegistry::get('tblclient');
	}

	public function index() {
		$this -> set('tblcategory', $this -> tblCategory -> find('all'));
	}
	public function inputdata() {

		//postデータが有るかの判断
		if($this->request->is('post')&&isset($this->request->data['clientName1'])) {
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
					//入力されたデータをバリデーションチェックするための準備
					$validate = $this->tblClient->newEntity($adddata);
					//バリデーションを実行して判断
					if(!$validate->errors()) {
						//入力されたデータをセッションに追加
						$this->Session->write('clientdata',$this->request->data);
						return $this->redirect(array('action' => 'inputkakunin'));
					} else {
						//バリデーションして不適切だった場合のエラー表示
						$errors = $validate->errors();
						$this->set('error',$errors);
					}

				} else {
					//エラー表示
					$this->set('errormail','メールアドレスが一致しません！！！！');
				}
		}
	}

	public function inputkakunin() {
		//お客様情報をセッシ
		$this->set('adddata',$this->Session->read('clientdata'));

		//お客様情報をDBに保存
		if($this->request->is('post')) {
			$tblclient = $this->tblClient->newEntity();
			$tblclient = $this->tblClient->patchEntity($tblclient,$this->request->data);
			if($result=$this->tblClient->save($tblclient)) {
				$this->Session->write('result',$result);
				$this->redirect(array('action'=>'buykakunin'));
			}
		}
	}

	/**
	 * Categorylist method
	 * By Category
	 * @param unknown $id
	 */
	public function categorylist($id = null) {
		// カテゴリ番号をSessionへ書き込む
		$this -> Session -> write('Category.id', $id);
		$tblitem = $this -> set('tblitem', $this -> paginate($this -> tblItem -> find()
					-> where(array('itemCategory' => $id))));

		// POST送信された場合
		if($this -> request -> is('post')) {
			$find = $this -> request -> data('find');
			// 検索フォームが空でない場合
			if($find != null) {
				$tblitem = $this -> set('tblitem', $this -> tblItem -> find()
						-> where(array("concat(itemName, itemData, itemPrice) like " => '%' .$find . '%')));
			}
		}
	}

	/**
	 * Shohindata method
	 * @param unknown $id */
	public function shohindata($id = null) {
		$tblitem = $this -> tblItem -> get($id);
		$this -> set(compact('tblitem'));

		// Sessionの読み込み
		$this -> set('sesCategoryid', $this -> Session -> read('Category.id'));

		// Sessionへ商品データの書き込み
		$this -> Session -> write('Item.id', $tblitem -> itemId);
		$this -> Session -> write('Item.name', $tblitem -> itemName);
		$this -> Session -> write('Item.img', $tblitem -> itemImg);
		$this -> Session -> write('Item.price', $tblitem -> itemPrice);
	}

	/**
	 * Cart method
	 */
	public function cart() {
		// SelectBoxの値をSessionへ書き込む
		$this -> Session -> write('Item.num', $this -> request -> data('select'));

		// Sessionの読み込み
		$this -> set('sesCategoryid', $this -> Session -> read('Category.id'));

		// 配列cartitemlistが空でなければ、Sessionを読み込む
		$cartitemlist = array();
		if(count($this -> Session -> read('cartitemlist')) != 0 ) {
			$cartitemlist = $this -> Session -> read('cartitemlist');
		}

		$pushFlg = false;

		for($i = 0; $i < count($this -> Session -> read('cartitemlist')); $i++) {
			if($cartitemlist[$i]['id'] == $this -> Session -> read('Item.id')) {
				if(($cartitemlist[$i]['num'] + $this -> Session -> read('Item.num')) > 5) {
					$cartitemlist[$i]['num'] = 5;
				}
				else {
					$cartitemlist[$i]['num'] += $this -> Session -> read('Item.num');
				}
				$pushFlg = true;
			}
		}

		if(!$pushFlg){
			if($this -> Session -> read('Item.id') != "") {
			array_push($cartitemlist, array(
					'id' => $this -> Session -> read('Item.id'),
					'name' => $this -> Session -> read('Item.name'),
					'img' => $this -> Session -> read('Item.img'),
					'num' => $this -> Session -> read('Item.num'),
					'price' => $this -> Session -> read('Item.price')
			));
			}
		}

		$this -> Session -> delete('Item.id');
		$this -> Session -> delete('Item.name');
		$this -> Session -> delete('Item.img');
		$this -> Session -> delete('Item.num');
		$this -> Session -> delete('Item.price');

		$_SESSION['cartitemlist'] = $cartitemlist;
		$this -> set('cartitemlist', $cartitemlist);
	}

	/**
	 * Delete method
	 * @param unknown $id
	 */
	public function delete($id = null) {

		$cartitemlist = $this -> Session -> read('cartitemlist');
		$newitemlist = array();

		foreach ($cartitemlist as $cartitem) {
			if ($cartitem['id'] != $id){
				array_push($newitemlist, $cartitem);
			}
		}
		$_SESSION['cartitemlist'] = $newitemlist;
		return $this -> redirect(array('action' => 'cart'));
	}


	public function buykakunin(){

		$this->set('itemlist',$this->Session ->read('cartitemlist'));

		//登録したデータのDBのIDを取得
		$result = $this->Session->read('result');
		//登録したデータの取得
		$clientdata = $this->tblClient->find()
						->where(array('clientId'=>$result->clientId));
		$this->set('clientdata',$clientdata);
	}

	public function itembuy(){
		//購入したアイテム情報の取得
		$cartitemlist = $this -> Session -> read('cartitemlist');
		//登録されたクライントのDBのID取得
		$result = $this->Session->read('result');
		//取得したIDからDBのデータを参照
		$clientdata = $this->tblClient->find()
					->where(array('clientId'=>$result->clientId));
		foreach ($clientdata as $clientdata):

		//お客様情報を配列に格納
		$adddata = array(
				'clientName'		=>	$clientdata['clientName'],

				'clientPostCode'	=>	$clientdata['clientPostCode'],

				'clientAdd' 		=>	$clientdata['clientAdd'],

				'clientTel'			=>	$clientdata['clientTel'],

				'clientMailAddress'	=>	$clientdata['clientMailAddress'],

				'clientSex' 		=>	$clientdata['clientSex'],

				'clientKana' 		=>	$clientdata['clientKana'],

				'clientBirthday'	=>  $clientdata['clientBirthday']
		);
		//お客様にmail送信
		$clientMail = new \Cake\Network\Email\Email();
		$clientMail->transport('sakura')
				->from('arigakoyo@se-project.sakura.ne.jp')
				->template('clientmail')
				->viewVars(array('adddata'=>$adddata,'item'=>$cartitemlist))
				->to($clientdata['clientMailAddress'])
				->subject('購入詳細情報')
				->send();
		//管理者にmail送信
		$adminMail = new \Cake\Network\Email\Email();
		$adminMail->transport('sakura')
				->from('arigakoyo@se-project.sakura.ne.jp')
				->template('adminmail')
				->viewVars(array('adddata'=>$adddata,'item'=>$cartitemlist))
				->to('izumi@se-project.sakura.ne.jp')
				->subject('購入詳細情報')
				->send();
		endforeach;

		$this->Session->destroy();

	}
}