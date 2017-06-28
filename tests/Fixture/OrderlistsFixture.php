<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * OrderlistsFixture
 *
 */
class OrderlistsFixture extends TestFixture
{

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'reservations_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'dishes_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        '_indexes' => [
            'fk_orderlists_has_dishes_dishes1_idx' => ['type' => 'index', 'columns' => ['dishes_id'], 'length' => []],
            'fk_orderlists_has_dishes_orderlists1_idx' => ['type' => 'index', 'columns' => ['reservations_id'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['reservations_id', 'dishes_id'], 'length' => []],
            'fk_orderlists_has_dishes_dishes1' => ['type' => 'foreign', 'columns' => ['dishes_id'], 'references' => ['dishes', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
            'fk_orderlists_has_dishes_orderlists1' => ['type' => 'foreign', 'columns' => ['reservations_id'], 'references' => ['reservations', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
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
            'reservations_id' => 1,
            'dishes_id' => 1
        ],
    ];
}
