<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Maids Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Users
 * @property \Cake\ORM\Association\HasMany $Bookings
 * @property \Cake\ORM\Association\HasMany $Comments
 * @property \Cake\ORM\Association\HasMany $Maidschedules
 *
 * @method \App\Model\Entity\Maid get($primaryKey, $options = [])
 * @method \App\Model\Entity\Maid newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Maid[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Maid|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Maid patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Maid[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Maid findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class MaidsTable extends Table
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

        $this->setTable('maids');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
            'joinType' => 'INNER'
        ]);
        $this->hasMany('Bookings', [
            'foreignKey' => 'maid_id'
        ]);
        $this->hasMany('Comments', [
            'foreignKey' => 'maid_id'
        ]);
        $this->hasMany('Maidschedules', [
            'foreignKey' => 'maid_id'
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
            ->allowEmpty('introduce');

        $validator
            ->allowEmpty('introduce_en');

        $validator
            ->allowEmpty('experience');

        $validator
            ->allowEmpty('job');

        $validator
            ->integer('thai_level')
            ->allowEmpty('thai_level');

        $validator
            ->integer('eng_level')
            ->allowEmpty('eng_level');

        $validator
            ->integer('workedtotal')
            ->allowEmpty('workedtotal');

        $validator
            ->integer('workrate')
            ->allowEmpty('workrate');

        $validator
            ->allowEmpty('description');

        $validator
            ->allowEmpty('isactive');

        $validator
            ->allowEmpty('isapproved');

        $validator
            ->allowEmpty('free_day');

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
        $rules->add($rules->existsIn(['user_id'], 'Users'));

        return $rules;
    }
}
