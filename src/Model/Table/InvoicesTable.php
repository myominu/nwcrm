<?php
namespace App\Model\Table;

use App\Model\Entity\Invoice;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Invoices Model
 *
 * @property \Cake\ORM\Association\BelongsToMany $Sales
 */
class InvoicesTable extends Table
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
        $this->table('invoices');
        $this->displayField('name');
        $this->primaryKey('id');
        $this->addBehavior('Timestamp');
        $this->addBehavior('Search.Searchable'); //search, filter
        $this->belongsToMany('Sales', [
            'foreignKey' => 'invoice_id',
            'targetForeignKey' => 'sale_id',
            'joinTable' => 'invoices_sales',
            'through' => 'InvoicesSales',  
        ]);
        $this->belongsTo('Clients', [
            'foreignKey' => 'client_id'
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
    public function findBalanceInvoicesSales(){
        $balanceSales = $this->find('list', [
            'conditions' => ['Invoices.balance_flg' => 1],  
        ]);
        return $balanceInvoicesSalesCount = $balanceSales->count();
    }
}
