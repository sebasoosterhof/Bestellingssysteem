<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Orderlists Model
 *
 * @property \App\Model\Table\DishesTable|\Cake\ORM\Association\BelongsTo $Dishes
 *
 * @method \App\Model\Entity\Orderlist get($primaryKey, $options = [])
 * @method \App\Model\Entity\Orderlist newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Orderlist[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Orderlist|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Orderlist patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Orderlist[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Orderlist findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class OrderlistsTable extends Table
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

        $this->setTable('orderlists');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Dishes', [
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
            ->date('reservation_date')
            ->requirePresence('reservation_date', 'create')
            ->notEmpty('reservation_date');

        $validator
            ->time('reseration_time')
            ->requirePresence('reseration_time', 'create')
            ->notEmpty('reseration_time');

        $validator
            ->integer('persons')
            ->requirePresence('persons', 'create')
            ->notEmpty('persons');

        $validator
            ->requirePresence('lastname', 'create')
            ->notEmpty('lastname');

        $validator
            ->email('email')
            ->requirePresence('email', 'create')
            ->notEmpty('email');

        $validator
            ->requirePresence('telephonenumber', 'create')
            ->notEmpty('telephonenumber');

        $validator
            ->allowEmpty('copmany_name');

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
        $rules->add($rules->isUnique(['email']));
        $rules->add($rules->existsIn(['dish_id'], 'Dishes'));

        return $rules;
    }
}
