<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * CashReceiptsSale Entity.
 */
class CashReceiptsSale extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * @var array
     */
    protected $_accessible = [
        'cash_type' => true,
        'cash_receipt' => true,
        'sale' => true,
    ];
}
