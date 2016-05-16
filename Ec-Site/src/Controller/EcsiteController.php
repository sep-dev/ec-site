<?php

namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;

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
	 * Shohinlist2 method
	 * By Category
	 * @param unknown $id
	 */
	public function categorylist($id = null) {
 		$tblcategory = $this -> tblCategory -> find();
 		$this -> set(compact('tblcategory'));
		$this -> set('tblitem', $this -> paginate($this -> tblItem));

		$find = $this -> request -> data('find');
		$tblitem = $this -> set('tblitem', $this -> tblItem -> find()
					-> where(array('itemCategory' => $id)));

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

		// Sessionへ商品データの書き込み
		$this -> Session -> write('Item.id', $tblitem -> itemId);
		$this -> Session -> write('Item.img', $tblitem -> itemImg);
		$this -> Session -> write('Item.name', $tblitem -> itemName);
		$this -> Session -> write('Item.price', $tblitem -> itemPrice);
	}

	public function cart() {
		// セレクトボックスの値をセッションへ書き込む
		$this -> Session -> write('Item.num', $this -> request -> data('num'));

		$this -> set('sesId', $this -> Session -> read('Item.id'));
		$this -> set('sesImg', $this -> Session -> read('Item.img'));
		$this -> set('sesName', $this -> Session -> read('Item.name'));
		$this -> set('sesPrice', $this -> Session -> read('Item.price'));
		$this -> set('sesNum', $this -> Session -> read('Item.num'));
	}

}