<?php

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Users Model
 *
 * @property \Cake\ORM\Association\HasMany $CAddresses
 * @property \Cake\ORM\Association\HasMany $CUserroles
 *
 * @method \App\Model\Entity\User get($primaryKey, $options = [])
 * @method \App\Model\Entity\User newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\User[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\User|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\User patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\User[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\User findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class UsersTable extends Table {

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config) {
        parent::initialize($config);

        $this->setTable('users');
        $this->setDisplayField('title');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->hasMany('CAddresses', [
            'foreignKey' => 'user_id'
        ]);
        $this->hasMany('CUserroles', [
            'foreignKey' => 'user_id'
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator) {
        $validator
                ->uuid('id')
                ->allowEmpty('id', 'create');

        $validator
                ->requirePresence('username', 'create')
                ->notEmpty('username');

        $validator
                ->requirePresence('password', 'create')
                ->notEmpty('password');

        $validator
                ->allowEmpty('code');

        $validator
                ->allowEmpty('title');

        $validator
                ->requirePresence('firstname', 'create')
                ->notEmpty('firstname');

        $validator
                ->requirePresence('lastname', 'create')
                ->notEmpty('lastname');

        $validator
                ->email('email')
                ->notEmpty('email');

        $validator
                ->allowEmpty('phone');

        $validator
                ->dateTime('birthday')
                ->allowEmpty('birthday');

        $validator
                ->allowEmpty('description');

        $validator
                ->allowEmpty('profile_image');

        $validator
                ->requirePresence('isactive', 'create')
                ->notEmpty('isactive');

        $validator
                ->allowEmpty('islocked');

        $validator
                ->dateTime('lastlogin')
                ->allowEmpty('lastlogin');

        $validator
                ->allowEmpty('verifycode');

        $validator
                ->uuid('createdby')
                ->allowEmpty('createdby');

        $validator
                ->uuid('updatedby')
                ->allowEmpty('updatedby');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules) {
        //$rules->add($rules->isUnique(['username']));
        $rules->add($rules->isUnique(['email']));

        return $rules;
    }

}
