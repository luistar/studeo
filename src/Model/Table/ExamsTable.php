<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Exams Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Professorships
 *
 * @method \App\Model\Entity\Exam get($primaryKey, $options = [])
 * @method \App\Model\Entity\Exam newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Exam[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Exam|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Exam patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Exam[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Exam findOrCreate($search, callable $callback = null, $options = [])
 */
class ExamsTable extends Table
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

        $this->table('exams');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->belongsTo('Professorships', [
            'foreignKey' => 'professorship_id',
            'joinType' => 'INNER'
        ]);
        
        $this->hasMany('Solutions');
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
            ->allowEmpty('url');

        $validator
            ->allowEmpty('path');

        $validator
            ->boolean('isExercise')
            ->requirePresence('isExercise', 'create')
            ->notEmpty('isExercise');

        $validator
            ->date('date')
            ->allowEmpty('date');

        $validator
            ->allowEmpty('info');

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
        $rules->add($rules->existsIn(['professorship_id'], 'Professorships'));

        return $rules;
    }
}
