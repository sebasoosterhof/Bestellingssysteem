<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Orderlist Entity
 *
 * @property int $id
 * @property int $reservations_id
 * @property int $dishes_id
 *
 * @property \App\Model\Entity\Reservation $reservation
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
        'reservations_id' => false,
        'dishes_id' => false
    ];
}
