<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Appsettings Model
 *
 * @method \App\Model\Entity\Appsetting get($primaryKey, $options = [])
 * @method \App\Model\Entity\Appsetting newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Appsetting[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Appsetting|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Appsetting patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Appsetting[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Appsetting findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class AppsettingsTable extends Table
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

        $this->setTable('appsettings');
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
            ->decimal('price_per_hour')
            ->requirePresence('price_per_hour', 'create')
            ->notEmpty('price_per_hour');

        $validator
            ->decimal('discount_percent')
            ->requirePresence('discount_percent', 'create')
            ->notEmpty('discount_percent');

        $validator
            ->integer('booking_no_running')
            ->allowEmpty('booking_no_running');

        return $validator;
    }
}
