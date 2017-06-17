<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Dishes Model
 *
 * @property \App\Model\Table\CategoriesTable|\Cake\ORM\Association\BelongsTo $Categories
 * @property \App\Model\Table\SubcategoriesTable|\Cake\ORM\Association\BelongsTo $Subcategories
 * @property \App\Model\Table\OrderlistsTable|\Cake\ORM\Association\HasMany $Orderlists
 *
 * @method \App\Model\Entity\Dish get($primaryKey, $options = [])
 * @method \App\Model\Entity\Dish newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Dish[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Dish|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Dish patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Dish[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Dish findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class DishesTable extends Table
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

        $this->setTable('dishes');
        $this->setDisplayField('title');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Categories', [
            'foreignKey' => 'category_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Subcategories', [
            'foreignKey' => 'subcategory_id',
            'joinType' => 'INNER'
        ]);
        $this->hasMany('Orderlists', [
            'foreignKey' => 'dish_id'
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
            ->integer('id')
            ->allowEmpty('id', 'create');

        $validator
            ->requirePresence('title', 'create')
            ->notEmpty('title');

        $validator
            ->requirePresence('description', 'create')
            ->notEmpty('description');

        $validator
            ->requirePresence('price', 'create')
            ->notEmpty('price');

        $validator
            ->allowEmpty('discount_title');

        $validator
            ->allowEmpty('discount_amount');

        $validator
            ->dateTime('discount_duration')
            ->allowEmpty('discount_duration');

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
        $rules->add($rules->existsIn(['category_id'], 'Categories'));
        $rules->add($rules->existsIn(['subcategory_id'], 'Subcategories'));

        return $rules;
    }
}
