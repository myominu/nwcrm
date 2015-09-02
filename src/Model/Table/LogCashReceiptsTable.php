<?php
namespace App\Model\Table;

use App\Model\Entity\LogCashReceipt;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * LogCashReceipts Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Clients
 * @property \Cake\ORM\Association\BelongsToMany $Sales
 */
class LogCashReceiptsTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        $this->table('log_cash_receipts');
        $this->displayField('name');
        $this->primaryKey('id');
        $this->addBehavior('Timestamp');
        $this->belongsTo('Clients', [
            'foreignKey' => 'client_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsToMany('Sales', [
            'foreignKey' => 'log_cash_receipt_id',
            'targetForeignKey' => 'sale_id',
            'joinTable' => 'log_cash_receipts_sales'
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
            ->add('id', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('id', 'create');
            
        $validator
            ->requirePresence('name', 'create')
            ->notEmpty('name');
            
        $validator
            ->allowEmpty('description');
            
        $validator
            ->add('total_amount', 'valid', ['rule' => 'decimal'])
            ->allowEmpty('total_amount');
            
        $validator
            ->add('payment_amount', 'valid', ['rule' => 'decimal'])
            ->allowEmpty('payment_amount');
            
        $validator
            ->add('balance_amount', 'valid', ['rule' => 'decimal'])
            ->allowEmpty('balance_amount');
            
        $validator
            ->add('balance_flg', 'valid', ['rule' => 'numeric'])
            ->requirePresence('balance_flg', 'create')
            ->notEmpty('balance_flg');
            
        $validator
            ->add('receipt_date', 'valid', ['rule' => 'datetime'])
            ->requirePresence('receipt_date', 'create')
            ->notEmpty('receipt_date');
            
        $validator
            ->requirePresence('receipt_no', 'create')
            ->notEmpty('receipt_no');

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
        $rules->add($rules->existsIn(['client_id'], 'Clients'));
        return $rules;
    }
}
