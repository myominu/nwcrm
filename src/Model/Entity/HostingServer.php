<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * HostingServer Entity.
 */
class HostingServer extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * @var array
     */
    protected $_accessible = [
        'name' => true,
        'server_dns' => true,
        'server_ip' => true,
        'ftp_host' => true,
        'db_host' => true,
        'hostings' => true,
    ];
}
