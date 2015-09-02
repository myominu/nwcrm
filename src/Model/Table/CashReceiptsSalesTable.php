<?php
namespace App\Model\Table;

use App\Model\Entity\CashReceiptsSale;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * CashReceiptsSales Model
 *
 * @property \Cake\ORM\Association\BelongsTo $CashReceipts
 * @property \Cake\ORM\Association\BelongsTo $Sales
 */
class CashReceiptsSalesTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        $this->table('cash_receipts_sales');
        $this->displayField('cash_receipt_id');
        $this->primaryKey(['cash_receipt_id', 'sale_id']);
        $this->belongsTo('CashReceipts', [
            'foreignKey' => 'cash_receipt_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Sales', [
            'foreignKey' => 'sale_id',
            'joinType' => 'INNER'
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->requirePresence('cash_type', 'create')
            ->notEmpty('cash_type');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->existsIn(['cash_receipt_id'], 'CashReceipts'));
        $rules->add($rules->existsIn(['sale_id'], 'Sales'));
        return $rules;
    }
}
