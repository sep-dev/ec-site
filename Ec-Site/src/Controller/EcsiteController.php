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

	//public $testarray = array();

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
		$this -> Session -> write('Item.name', $tblitem -> itemName);
		$this -> Session -> write('Item.img', $tblitem -> itemImg);
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

		$cartitemlist = array();
		if(count($this -> Session -> read('cartitemlist')) != 0 ) {
			$cartitemlist = $this -> Session -> read('cartitemlist');
		}

		if($this -> Session -> read('Item.id') != "") {
			array_push($cartitemlist, array(
					'sesId' => $this -> Session -> read('Item.id'),
					'sesName' => $this -> Session -> read('Item.name'),
					'sesImg' => $this -> Session -> read('Item.img'),
					'sesNum' => $this -> Session -> read('Item.num'),
					'sesPrice' => $this -> Session -> read('Item.price')
			));
			$this -> Session -> delete('Item.id');
			$this -> Session -> delete('Item.name');
			$this -> Session -> delete('Item.img');
			$this -> Session -> delete('Item.num');
			$this -> Session -> delete('Item.price');
		}

		$_SESSION['cartitemlist'] = $cartitemlist;

		pr($this->Session->read('cartitemlist'));
		$this -> set('cartitemlist', $cartitemlist);
	}

	public function delete($id = null) {

		$cartitemlist = $this -> Session -> read('cartitemlist');
		unset($cartitemlist[0]);
		if(($key = array_search(array_search($id, $cartitemlist))) !== false) {
			unset($cartitemlist[$key]);
		}
		return $this -> redirect(array('action' => 'cart'));
	}

	public function alldelete() {
		$this -> Session -> delete('cartitemlist');
		return $this -> redirect(array('action' => 'cart'));
	}

}