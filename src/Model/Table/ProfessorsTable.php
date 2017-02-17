<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Professors Model
 *
 * @method \App\Model\Entity\Professor get($primaryKey, $options = [])
 * @method \App\Model\Entity\Professor newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Professor[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Professor|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Professor patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Professor[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Professor findOrCreate($search, callable $callback = null, $options = [])
 */
class ProfessorsTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->table('professors');
        $this->displayField('id');
        $this->primaryKey('id');
        
        $this->hasMany('Professorships');
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
            ->integer('id')
            ->allowEmpty('id', 'create');

        $validator
            ->requirePresence('firstName', 'create')
            ->notEmpty('firstName');

        $validator
            ->requirePresence('lastName', 'create')
            ->notEmpty('lastName');

        $validator->allowEmpty('website')->urlWithProtocol("website");
		$validator->allowEmpty('docentiWebsite')->urlWithProtocol("docentiWebsite");
		
		$validator->add('docentiWebsite', 'custom', [
				'rule' => function ($value, $context) {
					if(stripos($value,"docenti.unina")!==false)
						return true;
					else
						return false;
				},
				'message' => 'Docenti website looks invalid.'
		]);
		

        $validator->allowEmpty('email1')->email('email1');
        $validator->allowEmpty('email2')->email('email2');
        
        $validator->allowEmpty('notes');

        return $validator;
    }
}
