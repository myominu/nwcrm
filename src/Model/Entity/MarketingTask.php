<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * MarketingTask Entity.
 */
class MarketingTask extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * @var array
     */
    protected $_accessible = [
        'title' => true,
        'description' => true,
        'task_type' => true,
        'client_id' => true,
        'market_resource_id' => true,
        'user_id' => true,
        'client' => true,
        'appointment_date' => true,
        'market_resource' => true,
        'user' => true,
        'vf_appointment_date_period' => true,
    ];

    protected function _getVfAppointmentDatePeriod()
    {
        $appointment_date = date_create($this->_properties['appointment_date']);
        $today = date_create(date('Y-m-d'));
        $dteDiff = $today->diff($appointment_date);      
        return $dteDiff->format("%R%a");       
    }
}
