<?php

namespace App\Model\Table;

use Cake\ORM\Table;

class CategoryTable extends Table {

	public function initialize(array $config) {
		$this -> addBehavior('Timestamp');

		$this -> hasMany('Item',
				array('className' => 'Item'));
	}

}