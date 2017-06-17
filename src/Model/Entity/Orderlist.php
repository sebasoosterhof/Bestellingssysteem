<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Orderlist Entity
 *
 * @property int $id
 * @property \Cake\I18n\FrozenDate $reservation_date
 * @property \Cake\I18n\FrozenTime $reseration_time
 * @property int $persons
 * @property string $lastname
 * @property string $email
 * @property string $telephonenumber
 * @property string $copmany_name
 * @property int $dish_id
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\Dish $dish
 */
class Orderlist extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        '*' => true,
        'id' => false
    ];
}
