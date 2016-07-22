<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Solutions Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Exams
 * @property \Cake\ORM\Association\BelongsTo $Contributors
 *
 * @method \App\Model\Entity\Solution get($primaryKey, $options = [])
 * @method \App\Model\Entity\Solution newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Solution[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Solution|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Solution patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Solution[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Solution findOrCreate($search, callable $callback = null)
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
        $this->belongsTo('Contributors', [
            'foreignKey' => 'contributor_id',
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
            ->requirePresence('url', 'create')
            ->notEmpty('url');

        $validator
            ->integer('number')
            ->requirePresence('number', 'create')
            ->notEmpty('number');

        $validator
            ->boolean('is_deleted')
            ->requirePresence('is_deleted', 'create')
            ->notEmpty('is_deleted');

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
        $rules->add($rules->existsIn(['contributor_id'], 'Contributors'));
        return $rules;
    }
}
