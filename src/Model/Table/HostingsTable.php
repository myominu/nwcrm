<?php
namespace App\Model\Table;

use App\Model\Entity\Hosting;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Hostings Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Sales
 * @property \Cake\ORM\Association\BelongsTo $HostingServers
 */
class HostingsTable extends Table
{
    public $filterArgs = array(
        'sale' => array(
            'type' => 'like',
            'field' => 'Sales.name'
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
        $this->table('hostings');
        $this->displayField('id');
        $this->primaryKey('id');
        $this->addBehavior('Timestamp');
        $this->addBehavior('Search.Searchable'); //search, filter
        $this->belongsTo('Sales', [
            'foreignKey' => 'sale_id'
        ]);
        $this->belongsTo('HostingServers', [
            'foreignKey' => 'hosting_server_id',
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
            ->allowEmpty('db_name');
            
        $validator
            ->allowEmpty('db_username');
            
        $validator
            ->allowEmpty('db_password');
            
        $validator
            ->allowEmpty('ftp_username');
            
        $validator
            ->allowEmpty('ftp_password');
            
        $validator
            ->allowEmpty('administrator_info');

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
        $rules->add($rules->existsIn(['sale_id'], 'Sales'));
        $rules->add($rules->existsIn(['hosting_server_id'], 'HostingServers'));
        return $rules;
    }
}
