<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\DishcategoriesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\DishcategoriesTable Test Case
 */
class DishcategoriesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\DishcategoriesTable
     */
    public $Dishcategories;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.dishcategories'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Dishcategories') ? [] : ['className' => DishcategoriesTable::class];
        $this->Dishcategories = TableRegistry::get('Dishcategories', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Dishcategories);

        parent::tearDown();
    }

    /**
     * Test initialize method
     *
     * @return void
     */
    public function testInitialize()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
