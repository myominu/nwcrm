<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Invoice Entity.
 */
class Invoice extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * @var array
     */
    protected $_accessible = [
        'name' => true,
        'client_id' => true,
        'description' => true,
        'total_amount' => true,
        'payment_amount' => true,
        'balance_amount' => true,
        'confirm_flg' => true,
        'balance_flg' => true,
        'clients' => true,
        'sales' => true,        
        'vf_total_amount' => true,
    ];

    protected function _getVfTotalAmount()
    {
        $amount = 0;
        foreach ($this->_properties['sales'] as $key => $value) {
            if($value->_joinData->cash_type == 'extend'){
                $amount = $amount + $this->_properties['sales'][$key]['sale_item_extend_price'];
            }else{
                $amount = $amount + $this->_properties['sales'][$key]['sale_item_cost_price'];
            }
        }
        return $amount;      
    }
}
