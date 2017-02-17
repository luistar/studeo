<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Requirements Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Courses
 *
 * @method \App\Model\Entity\Requirement get($primaryKey, $options = [])
 * @method \App\Model\Entity\Requirement newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Requirement[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Requirement|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Requirement patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Requirement[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Requirement findOrCreate($search, callable $callback = null, $options = [])
 */
class RequirementsTable extends Table
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

        $this->table('requirements');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->belongsTo('CoursesRequirement', [
        	'className' => 'Courses',
            'foreignKey' => 'course_id',
        	'bindingKey' => 'id',
        	'propertyName' =>'course'
        ]);
        
        $this->belongsTo('RequiredFor', [
        	'className' => 'Courses',
        	'foreignKey' => 'required_for',
        	'bindingKey' => 'id',
        	'propertyName' =>'required'
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
            ->integer('id')
            ->allowEmpty('id', 'create');

        $validator
            ->integer('required_for')
            ->requirePresence('required_for', 'create')
            ->notEmpty('required_for');
        
        $validator->add('required_for', 'custom', [
            'rule' => function ($value, $context) {
            	if($context['data']['course_id'] == $value)
           			return false;
            	else
            		return true;
            },
            'message' => __('A course cannot require itself!')
		]);

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
        $rules->add($rules->existsIn(['course_id'], 'CoursesRequirement'));
        $rules->add($rules->existsIn(['required_for'], 'RequiredFor'));

        return $rules;
    }
}
