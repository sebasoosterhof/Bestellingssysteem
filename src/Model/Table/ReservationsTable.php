<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Reservations Model
 *
 * @method \App\Model\Entity\Reservation get($primaryKey, $options = [])
 * @method \App\Model\Entity\Reservation newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Reservation[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Reservation|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Reservation patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Reservation[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Reservation findOrCreate($search, callable $callback = null, $options = [])
 */
class ReservationsTable extends Table
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

        $this->setTable('reservations');
        $this->setDisplayField('lastname');
        $this->setPrimaryKey('id');

        $this->belongsTo('Orderlists', [
            'foreignKey' => 'id'
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
            ->time('reservation_time')
            ->requirePresence('reservation_time', 'create')
            ->notEmpty('reservation_time');

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
            ->allowEmpty('company_name');

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

        return $rules;
    }
}
