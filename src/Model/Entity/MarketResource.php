<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * MarketResource Entity.
 */
class MarketResource extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * @var array
     */
    protected $_accessible = [
        'name' => true,
        'contact_info' => true,
    ];
}
