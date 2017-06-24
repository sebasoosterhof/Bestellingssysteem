<?php
// =================================================================
// @Author: Sebastian Oosterhof
// @Description: handles DishcategoryTable initialize and validationDefault functions.
// @Version: 1.0
// @Date: 26-06-2017
// =================================================================

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Dishcategories Model
 *
 * @method \App\Model\Entity\Dishcategory get($primaryKey, $options = [])
 * @method \App\Model\Entity\Dishcategory newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Dishcategory[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Dishcategory|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Dishcategory patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Dishcategory[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Dishcategory findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class DishcategoriesTable extends Table
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

        $this->setTable('dishcategories');
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
            ->integer('id')
            ->allowEmpty('id', 'create');

        $validator
            ->requirePresence('category', 'create')
            ->notEmpty('category');

        $validator
            ->requirePresence('subcategory', 'create')
            ->notEmpty('subcategory');

        return $validator;
    }
}
