<?php
namespace App\Model\Table;

use App\Model\Entity\Master;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Masters Model
 *
 * @property \Cake\ORM\Association\BelongsTo $ParentMasters
 * @property \Cake\ORM\Association\HasMany $ChildMasters
 */
class MastersTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        $this->table('masters');
        $this->displayField('name');
        $this->primaryKey('id');
        $this->addBehavior('Timestamp');
        $this->addBehavior('Tree');
        $this->belongsTo('ParentMasters', [
            'className' => 'Masters',
            'foreignKey' => 'parent_id'
        ]);
        $this->hasMany('ChildMasters', [
            'className' => 'Masters',
            'foreignKey' => 'parent_id'
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
            ->requirePresence('var1', 'create')
            ->notEmpty('var1');
            
        $validator
            ->requirePresence('var2', 'create')
            ->notEmpty('var2');
            
        $validator
            ->requirePresence('var3', 'create')
            ->notEmpty('var3');
            
        $validator
            ->requirePresence('icon1_file_name', 'create')
            ->allowEmpty('icon1_file_name');
            
        $validator
            ->requirePresence('icon2_file_name', 'create')
            ->allowEmpty('icon2_file_name');
            
        $validator
            ->requirePresence('icon3_file_name', 'create')
            ->allowEmpty('icon3_file_name');
            
        $validator
            ->requirePresence('text', 'create')
            ->allowEmpty('text');

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
        $rules->add($rules->existsIn(['parent_id'], 'ParentMasters'));
        return $rules;
    }
    
   public function findItem(Query $query, $options = [])
   {
    //return $options['name'];
        $parent = $this->findByName($options['name']);
        $parent_data = $parent->toArray();

        $cash_type = array();
        if(!empty($parent_data)){
            $cash_type = $this->find('treeList', [
                'conditions' => ['parent_id'=>$parent_data[0]['id']],
                'keyPath' => 'var1',
                'valuePath' => 'name',
                'spacer' => '-'
            ]);
        }

        return $cash_type;
   }
   
}
