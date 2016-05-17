<?php

namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;
<<<<<<< HEAD
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
		$this->Session = $this->request->session();
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

					$validate = $this->tblClient->newEntity($adddata);
					if(!$validate->errors()) {
						$this->Session->write('clientdata',$this->request->data);
						return $this->redirect(array('action' => 'inputkakunin'));
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

	public function inputkakunin() {

		$this->set('adddata',$this->Session->read('clientdata'));

		if($this->request->is('post')) {
			$tblclient = $this->tblClient->newEntity();
			$tblclient = $this->tblClient->patchEntity($tblclient,$this->request->data);
			if($this->tblClient->save($tblclient)) {
				$this->redirect(array('action'=>'buykakunin'));
			}
		}
	}
=======

class EcsiteController extends AppController {

	public $paginate = array(
			'limit' => 5
	);

	public $helpers = array(
			'Paginator' => array(
					'templates' => 'paginator-templates'
			)
	);

	/**
	 * Initialize method
	 * {@inheritDoc}
	 * @see \App\Controller\AppController::initialize()
	 */
	public function initialize() {
		parent::initialize();
        $this -> loadComponent('Paginator');
		// 参照テーブルを設定
        $this -> tblItem = TableRegistry::get('tblitem');
        $this -> tblCategory = TableRegistry::get('tblcategory');

	}

	public function index() {
		$this -> set('tblcategory', $this -> tblCategory -> find('all'));
	}

	/**
	 * Shohinlist method
	 * All Data
	 */
	public function shohinlist() {
		$this -> set('tblitem', $this -> paginate($this -> tblItem));

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
	 * @param unknown $id
	 */
	public function shohindata($id = null) {
		$tblitem = $this -> tblItem -> get($id);
		$this -> set(compact('tblitem'));

		// Sessionの読み込み
		$this -> set('sesCategoryid', $this -> Session -> read('Category.id'));

		// Sessionへ商品データの書き込み
		$this -> Session -> write('Item.id', $tblitem -> itemId);
		$this -> Session -> write('Item.img', $tblitem -> itemImg);
		$this -> Session -> write('Item.name', $tblitem -> itemName);
		$this -> Session -> write('Item.price', $tblitem -> itemPrice);
	}

	/**
	 * Cart method
	 */
	public function cart() {
		// SelectBoxの値をSessionへ書き込む
		$this -> Session -> write('Item.num', $this -> request -> data('num'));

		// Sessionの読み込み
		$this -> set('sesCategoryid', $this -> Session -> read('Category.id'));
		$this -> set('sesId', $this -> Session -> read('Item.id'));
		$this -> set('sesImg', $this -> Session -> read('Item.img'));
		$this -> set('sesName', $this -> Session -> read('Item.name'));
		$this -> set('sesPrice', $this -> Session -> read('Item.price'));
		$this -> set('sesNum', $this -> Session -> read('Item.num'));

		// POST送信された場合
		if($this -> request -> is('post')) {
			// sesCategoryidを削除する
			$this -> Session -> delete('sesCategoryid');
		}
	}

>>>>>>> ddb532eae4d75637727df804ceadcbc51ea7eb76
}