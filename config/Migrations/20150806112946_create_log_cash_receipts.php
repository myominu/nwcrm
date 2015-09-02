<?php
use Phinx\Migration\AbstractMigration;

class CreateLogCashReceipts extends AbstractMigration
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
        $table = $this->table('log_cash_receipts');
        $table->addColumn('name', 'string', [
            'default' => null,
            'limit' => 255,
            'null' => false,
        ]);
        $table->addColumn('client_id', 'integer', [
            'default' => null,
            'limit' => 11,
            'null' => false,
        ]);
        $table->addColumn('description', 'text', [
            'default' => null,
            'null' => true,
        ]);
        $table->addColumn('total_amount', 'decimal', [
            'default' => null,
            'null' => true,
        ]);
        $table->addColumn('payment_amount', 'decimal', [
            'default' => null,
            'null' => true,
        ]);
        $table->addColumn('balance_amount', 'decimal', [
            'default' => null,
            'null' => true,
        ]);
        $table->addColumn('balance_flg', 'integer', [
            'default' => 0,
            'limit' => 4,
            'null' => false,
        ]);
        $table->addColumn('receipt_date', 'datetime', [
            'default' => null,
            'null' => false,
        ]);
        $table->addColumn('receipt_no', 'string', [
            'default' => null,
            'limit' => 255,
            'null' => false,
        ]);
        $table->addColumn('created', 'datetime', [
            'default' => null,
            'null' => false,
        ]);
        $table->addColumn('modified', 'datetime', [
            'default' => null,
            'null' => false,
        ]);
        $table->addForeignKey('client_id', 'clients', 'id');
        $table->create();
    }
}
