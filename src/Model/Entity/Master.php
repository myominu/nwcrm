<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Master Entity.
 */
class Master extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * @var array
     */
    protected $_accessible = [
        'parent_id' => true,
        'name' => true,
        'lft' => true,
        'rght' => true,
        'var1' => true,
        'var2' => true,
        'var3' => true,
        'icon1_file_name' => true,
        'icon2_file_name' => true,
        'icon3_file_name' => true,
        'text' => true,
        'parent_master' => true,
        'child_masters' => true,
        //'item' => true,
    ];
}
