<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Professorships Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Groups
 * @property \Cake\ORM\Association\BelongsTo $Professors
 * @property \Cake\ORM\Association\HasMany $Exams
 *
 * @method \App\Model\Entity\Professorship get($primaryKey, $options = [])
 * @method \App\Model\Entity\Professorship newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Professorship[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Professorship|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Professorship patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Professorship[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Professorship findOrCreate($search, callable $callback = null)
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

        $this->belongsTo('Groups', [
            'foreignKey' => 'group_id'
        ]);
        $this->belongsTo('Professors', [
            'foreignKey' => 'professor_id'
        ]);
        $this->hasMany('Exams', [
            'foreignKey' => 'professorship_id'
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
            ->integer('year_start')
            ->requirePresence('year_start', 'create')
            ->notEmpty('year_start');

        $validator
            ->integer('year_end')
            ->allowEmpty('year_end');

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
        $rules->add($rules->existsIn(['group_id'], 'Groups'));
        $rules->add($rules->existsIn(['professor_id'], 'Professors'));
        return $rules;
    }
}
