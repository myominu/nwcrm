<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Client Entity.
 */
class Client extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * @var array
     */
    protected $_accessible = [
        'name' => true,
        'contact_person' => true,
        'contact_phone_number' => true,
        'contact_email' => true,
        'contact_address' => true,
        'city_id' => true,
        'state_id' => true,
        'zip' => true,
        'country_id' => true,
        'comment' => true,
        'city' => true,
        'state' => true,
        'country' => true,
        'sales' => true,
    ];
}
