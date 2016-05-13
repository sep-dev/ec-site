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
class TblclientTable extends Table
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
            ->requirePresence('clientName', 'create')
            ->notEmpty('clientName');

        $validator
            ->requirePresence('clientKana', 'create')
            ->notEmpty('clientKana');

        $validator
            ->requirePresence('clientSex', 'create')
            ->notEmpty('clientSex');

        $validator
            ->add('clientBirthday', 'valid', ['rule' => 'date'])
            ->allowEmpty('clientBirthday');

        $validator
            ->requirePresence('clientPostCode', 'create')
            ->notEmpty('clientPostCode');

        $validator
            ->requirePresence('clientAdd', 'create')
            ->notEmpty('clientAdd');

        $validator
            ->requirePresence('clientTel', 'create')
            ->notEmpty('clientTel');

        $validator
            ->requirePresence('clientMailAddress', 'create')
            ->notEmpty('clientMailAddress');

        return $validator;
    }
}
