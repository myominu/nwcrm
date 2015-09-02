<?php
use Phinx\Migration\AbstractMigration;

class CreateInvoicesSales extends AbstractMigration
{
    /**
     * Change Method.
     *
     * More information on this method is available here:
     * http://docs.phinx.org/en/latest/migrations.html#the-change-method
     * @return void
     */
    public function change()
    {
        $table = $this->table('invoices_sales', ['id' => false, 'primary_key' => ['invoice_id', 'sale_id']]);
        $table->addColumn('invoice_id', 'integer', [
            'default' => null,
            'limit' => 11,
            'null' => false,
        ]);
        $table->addColumn('sale_id', 'integer', [
            'default' => null,
            'limit' => 11,
            'null' => false,
        ]);
        $table->addForeignKey('invoice_id', 'invoices', 'id');
        $table->addForeignKey('sale_id', 'sales', 'id');        
        $table->create();
    }
}
