<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * LogCashReceipt Entity.
 */
class LogCashReceipt extends Entity
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
        'balance_flg' => true,
        'receipt_date' => true,
        'receipt_no' => true,
        'client' => true,
        'sales' => true,
    ];
}
