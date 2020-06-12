<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * CAddresses Model
 *
 * @property \Cake\ORM\Association\BelongsTo $CProvinces
 * @property \Cake\ORM\Association\BelongsTo $Users
 *
 * @method \App\Model\Entity\CAddress get($primaryKey, $options = [])
 * @method \App\Model\Entity\CAddress newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\CAddress[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\CAddress|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\CAddress patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\CAddress[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\CAddress findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class CAddressesTable extends Table
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

        $this->setTable('c_addresses');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('CProvinces', [
            'foreignKey' => 'c_province_id',
            'joinType' => 'LEFT'
        ]);
        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
            'joinType' => 'INNER'
        ]);
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
            ->uuid('id')
            ->allowEmpty('id', 'create');

        $validator
            ->requirePresence('address1', 'create')
            ->notEmpty('address1');

        $validator
            ->allowEmpty('address2');

        $validator
            ->allowEmpty('postal');

        $validator
            ->allowEmpty('tambol');

        $validator
            ->allowEmpty('amphur');

        $validator
            ->allowEmpty('description');

        $validator
            ->integer('seq')
            ->requirePresence('seq', 'create')
            ->notEmpty('seq');

        $validator
            ->allowEmpty('isdefault');

        $validator
            ->allowEmpty('isbilling');

        $validator
            ->allowEmpty('isdelivery');

        $validator
            ->allowEmpty('iscompany');

        $validator
            ->email('email')
            ->allowEmpty('email');

        $validator
            ->allowEmpty('phone');

        $validator
            ->allowEmpty('fax');

        $validator
            ->uuid('createdby')
            ->allowEmpty('createdby');

        $validator
            ->uuid('updatedby')
            ->allowEmpty('updatedby');

        $validator
            ->allowEmpty('lat');

        $validator
            ->allowEmpty('long');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->isUnique(['email']));
        $rules->add($rules->existsIn(['c_province_id'], 'CProvinces'));
        $rules->add($rules->existsIn(['user_id'], 'Users'));

        return $rules;
    }
}
