<?php
use Phinx\Migration\AbstractMigration;

class CreateCashReceiptsSales extends AbstractMigration
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
        $table = $this->table('cash_receipts_sales', ['id' => false, 'primary_key' => ['cash_receipt_id', 'sale_id']]);
        $table->addColumn('cash_receipt_id', 'integer', [
            'default' => null,
            'limit' => 11,
            'null' => false,
        ]);
        $table->addColumn('sale_id', 'integer', [
            'default' => null,
            'limit' => 11,
            'null' => false,
        ]);
        $table->addColumn('cash_type', 'string', [
            'default' => null,
            'limit' => 255,
            'null' => false,
        ]);
        $table->addForeignKey('cash_receipt_id', 'cash_receipts', 'id');
        $table->addForeignKey('sale_id', 'sales', 'id');
        $table->create();
    }
}
