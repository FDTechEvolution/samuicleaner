<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Packages Model
 *
 * @method \App\Model\Entity\Package get($primaryKey, $options = [])
 * @method \App\Model\Entity\Package newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Package[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Package|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Package patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Package[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Package findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class PackagesTable extends Table
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

        $this->setTable('packages');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');
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
            ->requirePresence('name_th', 'create')
            ->notEmpty('name_th');

        $validator
            ->requirePresence('name_en', 'create')
            ->notEmpty('name_en');

        $validator
            ->requirePresence('ismonthly', 'create')
            ->notEmpty('ismonthly');

        $validator
            ->requirePresence('isdiscount', 'create')
            ->notEmpty('isdiscount');

        $validator
            ->integer('service_per_month')
            ->requirePresence('service_per_month', 'create')
            ->notEmpty('service_per_month');

        $validator
            ->allowEmpty('description');

        return $validator;
    }
}
