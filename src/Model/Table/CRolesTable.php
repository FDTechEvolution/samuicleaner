<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * CRoles Model
 *
 * @property \Cake\ORM\Association\HasMany $CRoleaccesses
 * @property \Cake\ORM\Association\HasMany $CUserroles
 *
 * @method \App\Model\Entity\CRole get($primaryKey, $options = [])
 * @method \App\Model\Entity\CRole newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\CRole[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\CRole|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\CRole patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\CRole[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\CRole findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class CRolesTable extends Table
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

        $this->setTable('c_roles');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->hasMany('CRoleaccesses', [
            'foreignKey' => 'c_role_id'
        ]);
        $this->hasMany('CUserroles', [
            'foreignKey' => 'c_role_id'
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
            ->requirePresence('name', 'create')
            ->notEmpty('name');

        $validator
            ->integer('seq')
            ->allowEmpty('seq');

        $validator
            ->allowEmpty('description');

        $validator
            ->allowEmpty('isactive');

        $validator
            ->allowEmpty('isdefault');

        $validator
            ->uuid('createdby')
            ->allowEmpty('createdby');

        $validator
            ->uuid('updatedby')
            ->allowEmpty('updatedby');

        return $validator;
    }
}
