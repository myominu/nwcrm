<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Item Entity.
 */
class Item extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * @var array
     */
    protected $_accessible = [
        'name' => true,
        'category_id' => true,
        'item_number' => true,
        'description' => true,
        'item_cost_price' => true,
        'item_extend_price' => true,
        'category' => true,
        'sales' => true,
    ];
}
