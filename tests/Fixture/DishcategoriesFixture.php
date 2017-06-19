<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * DishcategoriesFixture
 *
 */
class DishcategoriesFixture extends TestFixture
{

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
        'category' => ['type' => 'string', 'length' => null, 'null' => false, 'default' => 'Lunch', 'collate' => 'latin1_swedish_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'subcategory' => ['type' => 'string', 'length' => null, 'null' => false, 'default' => 'Broodjes', 'collate' => 'latin1_swedish_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'created' => ['type' => 'datetime', 'length' => null, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null],
        'modified' => ['type' => 'datetime', 'length' => null, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null],
        '_indexes' => [
            'category' => ['type' => 'index', 'columns' => ['category'], 'length' => []],
            'subcategory' => ['type' => 'index', 'columns' => ['subcategory'], 'length' => []],
            'category_2' => ['type' => 'index', 'columns' => ['category'], 'length' => []],
            'subcategory_2' => ['type' => 'index', 'columns' => ['subcategory'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
        ],
        '_options' => [
            'engine' => 'InnoDB',
            'collation' => 'latin1_swedish_ci'
        ],
    ];
    // @codingStandardsIgnoreEnd

    /**
     * Records
     *
     * @var array
     */
    public $records = [
        [
            'id' => 1,
            'category' => 'Lorem ipsum dolor sit amet',
            'subcategory' => 'Lorem ipsum dolor sit amet',
            'created' => '2017-06-17 12:57:11',
            'modified' => '2017-06-17 12:57:11'
        ],
    ];
}
