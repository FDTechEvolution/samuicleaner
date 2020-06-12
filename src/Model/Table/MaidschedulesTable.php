<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Maidschedules Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Maids
 * @property \Cake\ORM\Association\BelongsTo $Bookings
 *
 * @method \App\Model\Entity\Maidschedule get($primaryKey, $options = [])
 * @method \App\Model\Entity\Maidschedule newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Maidschedule[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Maidschedule|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Maidschedule patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Maidschedule[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Maidschedule findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class MaidschedulesTable extends Table
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

        $this->setTable('maidschedules');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Maids', [
            'foreignKey' => 'maid_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Bookings', [
            'foreignKey' => 'booking_id'
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
            ->date('startdate')
            ->requirePresence('startdate', 'create')
            ->notEmpty('startdate');

        $validator
            ->date('enddate')
            ->requirePresence('enddate', 'create')
            ->notEmpty('enddate');

        $validator
            ->time('starttime')
            ->requirePresence('starttime', 'create')
            ->notEmpty('starttime');

        $validator
            ->time('endtime')
            ->requirePresence('endtime', 'create')
            ->notEmpty('endtime');

        $validator
            ->allowEmpty('type');

        $validator
            ->allowEmpty('description');

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
        $rules->add($rules->existsIn(['maid_id'], 'Maids'));
        $rules->add($rules->existsIn(['booking_id'], 'Bookings'));

        return $rules;
    }
}
