<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\MarketingTasksTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\MarketingTasksTable Test Case
 */
class MarketingTasksTableTest extends TestCase
{

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.marketing_tasks',
        'app.clients',
        'app.cities',
        'app.states',
        'app.countries',
        'app.sales',
        'app.items',
        'app.categories',
        'app.cash_receipts',
        'app.cash_receipts_sales',
        'app.market_resources',
        'app.users'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('MarketingTasks') ? [] : ['className' => 'App\Model\Table\MarketingTasksTable'];
        $this->MarketingTasks = TableRegistry::get('MarketingTasks', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->MarketingTasks);

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

    /**
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
