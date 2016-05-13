<?php

namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;

class EcsiteController extends AppController {

	public function cart() {
	}

	public function initialize() {
		$this-> tblClient = TableRegistry::get('tblclient');
	}

	public function inputdata() {
		if($this->request->is('post')) {

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

				'clientMailAddress'	=>	$this->request->data['clientMailAddress'],

				'clientSex' 		=>	$this->request->data['clientSex'],

				'clientKana' 		=>	$this->request->data['clientKana1'].
										$this->request->data['clientKana2'],

				'clientBirthday'	=>	$this->request->data['clientBirthyear']."-".
										$this->request->data['clientBirthMonth']."-".
										$this->request->data['clientBirthday']
 			);
			print_r($adddata);
			print("\n");
			print_r($this->request->data);
// 			$tblClient = $this->tblClient->newEntity();
// 			$tblClient = $this->tblClient->patchEntity($tblClient,$adddata);

// 			$this->tblClient->save($adddata);

		}
	}
}