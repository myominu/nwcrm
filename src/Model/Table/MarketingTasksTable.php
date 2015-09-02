<?php
namespace App\Model\Table;

use App\Model\Entity\MarketingTask;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * MarketingTasks Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Clients
 * @property \Cake\ORM\Association\BelongsTo $MarketResources
 * @property \Cake\ORM\Association\BelongsTo $Users
 */
class MarketingTasksTable extends Table
{
    public $filterArgs = array(
        'title' => array(
            'type' => 'like',
            'field' => 'title'
        )
    );

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        $this->table('marketing_tasks');
        $this->displayField('title');
        $this->primaryKey('id');
        $this->addBehavior('Timestamp');
        $this->addBehavior('Search.Searchable'); //search, filter
        $this->belongsTo('Clients', [
            'foreignKey' => 'client_id'
        ]);
        $this->belongsTo('MarketResources', [
            'foreignKey' => 'market_resource_id'
        ]);
        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
            'joinType' => 'INNER'
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->add('id', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('id', 'create');
            
        $validator
            ->requirePresence('title', 'create')
            ->notEmpty('title');
            
        $validator
            ->requirePresence('description', 'create')
            ->notEmpty('description');
            
        $validator
            ->requirePresence('task_type', 'create')
            ->notEmpty('task_type');

        $validator
            ->add('appointment_date', 'valid', ['rule' => 'datetime'])
            ->requirePresence('appointment_date', 'create')
            ->notEmpty('appointment_date');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->existsIn(['client_id'], 'Clients'));
        $rules->add($rules->existsIn(['market_resource_id'], 'MarketResources'));
        $rules->add($rules->existsIn(['user_id'], 'Users'));
        return $rules;
    }

    //find recent appointment tasks
    public function findAppointmentTasks(){
        $appointmentTasks = $this->find('list', [
            'conditions' => [
            'MarketingTasks.appointment_date >=' => new \DateTime('-4 days'),
            'MarketingTasks.appointment_date <=' => new \DateTime('+10 days')
            ],                    
        ]);
        return $appointmentTasksCount = $appointmentTasks->count();
    }
}
