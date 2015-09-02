<?php
namespace App\Model\Table;

use App\Model\Entity\HostingServer;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * HostingServers Model
 *
 * @property \Cake\ORM\Association\HasMany $Hostings
 */
class HostingServersTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        $this->table('hosting_servers');
        $this->displayField('name');
        $this->primaryKey('id');
        $this->addBehavior('Timestamp');
        $this->hasMany('Hostings', [
            'foreignKey' => 'hosting_server_id'
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
            ->requirePresence('name', 'create')
            ->notEmpty('name');
            
        $validator
            ->requirePresence('server_dns', 'create')
            ->notEmpty('server_dns');
            
        $validator
            ->requirePresence('server_ip', 'create')
            ->notEmpty('server_ip');
            
        $validator
            ->requirePresence('ftp_host', 'create')
            ->notEmpty('ftp_host');
            
        $validator
            ->requirePresence('db_host', 'create')
            ->notEmpty('db_host');

        return $validator;
    }
}
