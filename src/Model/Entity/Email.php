<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Email Entity.
 */
class Email extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * @var array
     */
    protected $_accessible = [
        'sale_id' => true,
        'username' => true,
        'password' => true,
        'url' => true,
        'sale' => true,
    ];
}
