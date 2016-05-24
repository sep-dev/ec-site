<?php
namespace App\Model\Table;

use App\Model\Entity\Tblclient;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Tblclient Model
 *
 */
class TblclientTable extends table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->table('tblclient');
        $this->displayField('clientId');
        $this->primaryKey('clientId');
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->add('clientId', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('clientId', 'create');

        $validator
            ->requirePresence('clientMailAddress', 'create')
            ->add('clientMailAddress','validFormat',array(
            		'rule'=>array('custom','|^[0-9a-z_./?-]+@([0-9a-z-]+\.)+[0-9a-z-]+$|'),
            		'message' => 'メールアドレスが不正です！！'
            ))
            ->notEmpty('clientMailAddress');


        $validator
            ->requirePresence('clientName', 'create')
            ->add('clientName','validFormat',array(
            		'rule'=>array('custom','/^[ぁ-んァ-ヶー一-龠]+$/i'),
            		'message' => '名前が不正です！！'
            ));

        $validator
            ->requirePresence('clientKana', 'create')
            ->notEmpty('clientKane',array('message'=>'カナが未入力です'))
            ->add('clientKana','validFormat',array(
            		'rule'=>array('custom','/^[ァ-ヾ]+$/u'),
            		'message' => 'カナが不正です！！'
            ));

        $validator
            ->requirePresence('clientSex', 'create')
            ->notEmpty('clientSex');

        $validator
            ->allowEmpty('clientBirthday');

        $validator
            ->requirePresence('clientPostCode', 'create')
            ->add('clientPostCode','validFormat',array(
            		'rule'=>array('custom','/^\d{3}\-\d{4}$/'),
            		'message' => '郵便番号が不正です！！'
            ))
            ->notEmpty('clientPostCode');

        $validator
            ->requirePresence('clientAdd', 'create')
            ->add('clientAdd','validFormat',array(
            		'rule'=>array('custom','/^[ぁ-んァ-ヶーa-zA-Z0-9一-龠０-９ー\-\－\n\r]+$/u'),
            		'message' => '住所が不正です！！'
            ))
            ->notEmpty('clientAdd');

        $validator
            ->requirePresence('clientTel', 'create')
            ->add('clientTel','validFormat',array(
            		'rule'=>array('custom','/^\d{1,4}-\d{4}$|^\d{2,5}-\d{1,4}-\d{4}$/u'),
            		'message' => '電話番号が不正です！！'
            ))
            ->notEmpty('clientTel');



        return $validator;
    }
}
