<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\InvoicesSalesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\InvoicesSalesTable Test Case
 */
class InvoicesSalesTableTest extends TestCase
{

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.invoices_sales',
        'app.invoices',
        'app.sales',
        'app.items',
        'app.categories',
        'app.clients',
        'app.cities',
        'app.states',
        'app.countries',
        'app.cash_receipts',
        'app.cash_receipts_sales'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('InvoicesSales') ? [] : ['className' => 'App\Model\Table\InvoicesSalesTable'];
        $this->InvoicesSales = TableRegistry::get('InvoicesSales', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->InvoicesSales);

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
