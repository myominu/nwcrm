<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Hosting Entity.
 */
class Hosting extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * @var array
     */
    protected $_accessible = [
        'sale_id' => true,
        'hosting_server_id' => true,
        'db_name' => true,
        'db_username' => true,
        'db_password' => true,
        'ftp_username' => true,
        'ftp_password' => true,
        'administrator_info' => true,
        'sale' => true,
        'hosting_server' => true,
    ];
}
