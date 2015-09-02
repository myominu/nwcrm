<?php
namespace App\Model\Table;

use App\Model\Entity\Sale;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Sales Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Items
 * @property \Cake\ORM\Association\BelongsTo $Clients
 */
class SalesTable extends Table
{

    public $filterArgs = array(
        'name' => array(
            'type' => 'like',
            'field' => 'name'
        ),
        'date' => array(
            'type' => 'finder',
            'finder' => 'byDate',
        ),
    );

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        $this->table('sales');
        $this->displayField('name');
        $this->primaryKey('id');
        $this->addBehavior('Timestamp');
        $this->addBehavior('Search.Searchable'); //search, filter
        $this->belongsTo('Items', [
            'foreignKey' => 'item_id'
        ]);
        $this->belongsTo('Clients', [
            'foreignKey' => 'client_id'
        ]);
        $this->belongsToMany('CashReceipts', [            
            'foreignKey' => 'sale_id',
            'targetForeignKey' => 'cash_receipt_id',
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
            ->allowEmpty('description');
            
        $validator
            ->add('sale_item_cost_price', 'valid', ['rule' => 'decimal'])
            ->requirePresence('sale_item_cost_price', 'create')
            ->notEmpty('sale_item_cost_price');
            
        $validator
            ->add('sale_item_extend_price', 'valid', ['rule' => 'decimal'])
            ->allowEmpty('sale_item_extend_price');
            
        $validator
            ->add('item_extend_start_date', 'valid', ['rule' => 'date'])
            ->allowEmpty('item_extend_start_date');
            
        $validator
            ->add('item_extend_end_date', 'valid', ['rule' => 'date'])
            ->allowEmpty('item_extend_end_date');
            
        $validator
            ->allowEmpty('item_domain_url');

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
        $rules->add($rules->existsIn(['item_id'], 'Items'));
        $rules->add($rules->existsIn(['client_id'], 'Clients'));
        return $rules;
    }

    public function findByDate(Query $query, $options = []) {
        $start_date = date('Y-m-d', mktime(0, 0, 0, $options['date']['month'], 1, $options['date']['year']));
        $end_date = date('Y-m-d', mktime(0, 0, 0, $options['date']['month'] + 1, 10, $options['date']['year']));

        $conditions = array(
            'AND' => array(
                'Sales.item_extend_end_date >=' => '' . $this->formatLike($start_date) . '',
                'Sales.item_extend_end_date <=' => '' . $this->formatLike($end_date) . '',
            )
        );
        return $query->where($conditions);
    }

    //find recent extend end sales
    public function findRecentExtendEndSales(){
        $recentExtendEndSales = $this->find('list', [
            'conditions' => [
            'Sales.item_extend_end_date >=' => new \DateTime('-4 days'),
            'Sales.item_extend_end_date <=' => new \DateTime('+10 days')
            ],                    
        ]);
        return $recentExtendEndSalesCount = $recentExtendEndSales->count();
        
    }


}
