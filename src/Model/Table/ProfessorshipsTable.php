<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Professorships Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Professors
 * @property \Cake\ORM\Association\BelongsTo $Courses
 *
 * @method \App\Model\Entity\Professorship get($primaryKey, $options = [])
 * @method \App\Model\Entity\Professorship newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Professorship[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Professorship|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Professorship patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Professorship[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Professorship findOrCreate($search, callable $callback = null, $options = [])
 */
class ProfessorshipsTable extends Table
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

        $this->table('professorships');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->belongsTo('Professors', [
            'foreignKey' => 'professor_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Courses', [
            'foreignKey' => 'course_id',
            'joinType' => 'INNER'
        ]);
        
        $this->hasMany('Exams');
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
            ->allowEmpty('description');

        $validator
            ->integer('start_date')
            ->allowEmpty('start_date');

        $validator
            ->integer('end_date')
            ->allowEmpty('end_date');

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
        $rules->add($rules->existsIn(['professor_id'], 'Professors'));
        $rules->add($rules->existsIn(['course_id'], 'Courses'));

        return $rules;
    }
}
