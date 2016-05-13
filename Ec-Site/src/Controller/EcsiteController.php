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
		// tblItemを参照できるように設定
		$this -> tblItem = TableRegistry::get('tblitem');
	}

	/**
	 * Shouhinlist method
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

	public function shohindata($id = null) {
		$tblitem = $this -> tblItem -> get($id);
		$this -> set(compact('tblitem'));
	}

}