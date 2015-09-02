<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * InvoicesSale Entity.
 */
class InvoicesSale extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * @var array
     */
    protected $_accessible = [
        'cash_type' => true,
        'invoice' => true,
        'sale' => true,
    ];
}
