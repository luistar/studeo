<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;
use Cake\ORM\Rule\ExistsIn;
use Cake\ORM\TableRegistry;

/**
 * Solutions Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Exams
 *
 * @method \App\Model\Entity\Solution get($primaryKey, $options = [])
 * @method \App\Model\Entity\Solution newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Solution[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Solution|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Solution patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Solution[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Solution findOrCreate($search, callable $callback = null, $options = [])
 */
class SolutionsTable extends Table
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

        $this->table('solutions');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->belongsTo('Exams', [
            'foreignKey' => 'exam_id',
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
            ->integer('id')
            ->allowEmpty('id', 'create');

        $validator
            ->integer('author')
            ->allowEmpty('author');

        $validator
            ->allowEmpty('authorAlt');

        $validator
            ->integer('addedBy')
            ->requirePresence('addedBy', 'create')
            ->notEmpty('addedBy');

        $validator
            ->requirePresence('url', 'create')
            ->notEmpty('url')
        	->url('url');

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
        $rules->add($rules->existsIn(['exam_id'], 'Exams'));
        $rules->add(function($entity, $options){
        	if($entity->author){ //if author id was specified check it matches with a real user
        		$author = TableRegistry::get('PhpbbUsers')->find()->where(['user_id'=>$entity->author])->all()->count();
        		if($author == 0)
        			return false;
        	}
        	if($entity->addedBy){ //if addedBy id was specified check it matches with a real user
        		$contrib = TableRegistry::get('PhpbbUsers')->find()->where(['user_id'=>$entity->addedBy])->all()->count();
        		if($contrib == 0)
        			return false;
        	}
        	return true;
        });

        return $rules;
    }
}
