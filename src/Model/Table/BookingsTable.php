<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Bookings Model
 *
 * @property \App\Model\Table\MaidsTable|\Cake\ORM\Association\BelongsTo $Maids
 * @property \App\Model\Table\UsersTable|\Cake\ORM\Association\BelongsTo $Users
 * @property \App\Model\Table\CAddressesTable|\Cake\ORM\Association\BelongsTo $CAddresses
 * @property \App\Model\Table\MaidschedulesTable|\Cake\ORM\Association\HasMany $Maidschedules
 * @property \App\Model\Table\PaymentsTable|\Cake\ORM\Association\HasMany $Payments
 * @property \App\Model\Table\ServiceItemsTable|\Cake\ORM\Association\HasMany $ServiceItems
 *
 * @method \App\Model\Entity\Booking get($primaryKey, $options = [])
 * @method \App\Model\Entity\Booking newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Booking[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Booking|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Booking patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Booking[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Booking findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class BookingsTable extends Table
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

        $this->setTable('bookings');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Maids', [
            'foreignKey' => 'maid_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('CAddresses', [
            'foreignKey' => 'c_address_id'
        ]);
        $this->hasMany('Maidschedules', [
            'foreignKey' => 'booking_id'
        ]);
        $this->hasMany('Payments', [
            'foreignKey' => 'booking_id'
        ]);
        $this->hasMany('ServiceItems', [
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
            ->date('date')
            ->allowEmpty('date');

        $validator
            ->time('time')
            ->allowEmpty('time');

        $validator
            ->integer('roomsize')
            ->allowEmpty('roomsize');

        $validator
            ->scalar('package')
            ->allowEmpty('package');

        $validator
            ->decimal('price')
            ->allowEmpty('price');

        $validator
            ->decimal('hour')
            ->allowEmpty('hour');

        $validator
            ->integer('total_room')
            ->allowEmpty('total_room');

        $validator
            ->scalar('service_area')
            ->allowEmpty('service_area');

        $validator
            ->scalar('description')
            ->allowEmpty('description');

        $validator
            ->scalar('ismonthly')
            ->allowEmpty('ismonthly');

        $validator
            ->scalar('iscompleted')
            ->allowEmpty('iscompleted');

        $validator
            ->scalar('status')
            ->allowEmpty('status');

        $validator
            ->scalar('service_type')
            ->allowEmpty('service_type');

        $validator
            ->scalar('bookingno')
            ->requirePresence('bookingno', 'create')
            ->notEmpty('bookingno');

        $validator
            ->scalar('ispaid')
            ->allowEmpty('ispaid');

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
        $rules->add($rules->existsIn(['user_id'], 'Users'));
        $rules->add($rules->existsIn(['c_address_id'], 'CAddresses'));

        return $rules;
    }
}
