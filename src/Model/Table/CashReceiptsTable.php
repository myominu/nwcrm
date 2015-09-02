<?php
namespace App\Model\Table;

use App\Model\Entity\CashReceipt;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * CashReceipts Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Clients
 * @property \Cake\ORM\Association\BelongsToMany $Sales
 */
class CashReceiptsTable extends Table
{
    public $filterArgs = array(
        'name' => array(
            'type' => 'like',
            'field' => 'name'
        )
    );

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        $this->table('cash_receipts');
        $this->displayField('name');
        $this->primaryKey('id');
        $this->addBehavior('Timestamp');
        $this->addBehavior('Search.Searchable'); //search, filter
        $this->belongsTo('Clients', [
            'foreignKey' => 'client_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsToMany('Sales', [
            'foreignKey' => 'cash_receipt_id',
            'targetForeignKey' => 'sale_id',
            'joinTable' => 'cash_receipts_sales',
            'through' => 'CashReceiptsSales',          
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
            ->requirePresence('client_id', 'create')
            ->notEmpty('client_id');

        $validator
            ->requirePresence('sales', 'create')
            ->notEmpty('sales');
            
        $validator
            ->allowEmpty('description');
            
        $validator
            ->add('total_amount', 'valid', ['rule' => 'decimal'])
            ->allowEmpty('total_amount');

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

    public function beforeSave($event, $entity, $options)
    {
        if ($entity->total_amount != $entity->payment_amount) {
            $entity->balance_flg = 1;            
            $entity->balance_amount = $entity->total_amount - $entity->payment_amount;
                 
        }else{
            $entity->balance_flg = 0;
            //$entity->balance_amount = 0;
        }
           
    }

    //balance sales
    public function findBalanceSales(){
        $balanceSales = $this->find('list', [
            'conditions' => ['CashReceipts.balance_flg' => 1],  
        ]);
        return $balanceSalesCount = $balanceSales->count();
    }
}
