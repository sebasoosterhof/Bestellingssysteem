<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Orderlists Model
 *
 * @property \App\Model\Table\ReservationsTable|\Cake\ORM\Association\BelongsTo $Reservations
 * @property \App\Model\Table\DishesTable|\Cake\ORM\Association\BelongsTo $Dishes
 *
 * @method \App\Model\Entity\Orderlist get($primaryKey, $options = [])
 * @method \App\Model\Entity\Orderlist newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Orderlist[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Orderlist|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Orderlist patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Orderlist[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Orderlist findOrCreate($search, callable $callback = null, $options = [])
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
        $this->setDisplayField('reservations_id', 'dishes_id');
        // $this->setPrimaryKey(['reservations_id', 'dishes_id']);
        $this->setPrimaryKey(['id']);

        $this->belongsTo('Dishes', [
            'foreignKey' => 'dishes_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Reservations', [
            'foreignKey' => 'reservations_id',
            'joinType' => 'INNER'
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
            ->allowEmpty('id');

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
        $rules->add($rules->existsIn(['dishes_id'], 'Dishes'));
        $rules->add($rules->existsIn(['reservations_id'], 'Reservations'));

        return $rules;
    }
}
