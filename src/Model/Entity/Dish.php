<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Dish Entity
 *
 * @property int $id
 * @property int $category_id
 * @property int $subcategory_id
 * @property string $title
 * @property string $description
 * @property string $price
 * @property string $discount_title
 * @property string $discount_amount
 * @property \Cake\I18n\FrozenTime $discount_duration
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\Category $category
 * @property \App\Model\Entity\Subcategory $subcategory
 * @property \App\Model\Entity\Orderlist[] $orderlists
 */
class Dish extends Entity
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
