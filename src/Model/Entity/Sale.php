<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Sale Entity.
 */
class Sale extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * @var array
     */
    protected $_accessible = [
        'name' => true,
        'item_id' => true,
        'client_id' => true,        
        'description' => true,
        'sale_item_cost_price' => true,
        'sale_item_extend_price' => true,
        'item_unit' => true,
        'item_extend_start_date' => true,
        'item_extend_end_date' => true,
        'item_domain_url' => true,
        'item' => true,
        'client' => true,
        'vf_extend_period' => true,
        'vf_extend_year' => true,     
    ];


    protected function _getVfExtendPeriod()
    {
        $end_date = date_create($this->_properties['item_extend_end_date']);
        $today = date_create(date('Y-m-d'));
        if (isset($end_date)) {
            $dteDiff = $today->diff($end_date);      
            return $dteDiff->format("%R%a");            
        }        
    }

    protected function _getVfExtendYear()
    {
        $start_date = date_create($this->_properties['item_extend_start_date']);
        $end_date = date_create($this->_properties['item_extend_end_date']);
        //$today = date_create(date('Y-m-d'));
        if (isset($end_date)) {
            $dteDiff = $start_date->diff($end_date);      
            return $dteDiff->format("%y");            
        }        
    }

    
  
}
