<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\LogCashReceiptsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\LogCashReceiptsTable Test Case
 */
class LogCashReceiptsTableTest extends TestCase
{

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.log_cash_receipts',
        'app.clients',
        'app.cities',
        'app.states',
        'app.countries',
        'app.sales',
        'app.items',
        'app.categories',
        'app.cash_receipts',
        'app.cash_receipts_sales',
        'app.log_cash_receipts_sales'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('LogCashReceipts') ? [] : ['className' => 'App\Model\Table\LogCashReceiptsTable'];
        $this->LogCashReceipts = TableRegistry::get('LogCashReceipts', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->LogCashReceipts);

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
