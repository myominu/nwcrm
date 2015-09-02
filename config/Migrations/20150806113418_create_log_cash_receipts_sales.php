<?php
use Phinx\Migration\AbstractMigration;

class CreateLogCashReceiptsSales extends AbstractMigration
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
        $table = $this->table('log_cash_receipts_sales');
        $table->addColumn('log_cash_receipt_id', 'integer', [
            'default' => null,
            'limit' => 11,
            'null' => false,
        ]);
        $table->addColumn('sale_description', 'text', [
            'default' => null,
            'null' => false,
        ]);
        $table->addColumn('sale_amount', 'decimal', [
            'default' => null,
            'null' => false,
        ]);
        $table->addColumn('cash_type', 'string', [
            'default' => null,
            'limit' => 255,
            'null' => false,
        ]);
        $table->addForeignKey('log_cash_receipt_id', 'log_cash_receipts', 'id');
        $table->create();
    }
}
