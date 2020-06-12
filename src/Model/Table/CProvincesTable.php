<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * CProvinces Model
 *
 * @property \Cake\ORM\Association\HasMany $CAddresses
 *
 * @method \App\Model\Entity\CProvince get($primaryKey, $options = [])
 * @method \App\Model\Entity\CProvince newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\CProvince[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\CProvince|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\CProvince patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\CProvince[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\CProvince findOrCreate($search, callable $callback = null, $options = [])
 */
class CProvincesTable extends Table
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

        $this->setTable('c_provinces');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->hasMany('CAddresses', [
            'foreignKey' => 'c_province_id'
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
            ->allowEmpty('code');

        $validator
            ->allowEmpty('name');

        $validator
            ->integer('geoid')
            ->allowEmpty('geoid');

        return $validator;
    }
}
