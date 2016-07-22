<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * ProfessorEmails Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Professors
 *
 * @method \App\Model\Entity\ProfessorEmail get($primaryKey, $options = [])
 * @method \App\Model\Entity\ProfessorEmail newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\ProfessorEmail[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\ProfessorEmail|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\ProfessorEmail patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\ProfessorEmail[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\ProfessorEmail findOrCreate($search, callable $callback = null)
 */
class ProfessorEmailsTable extends Table
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

        $this->table('professor_emails');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->belongsTo('Professors', [
            'foreignKey' => 'professor_id',
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
            ->email('email')
            ->requirePresence('email', 'create')
            ->notEmpty('email');

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
        $rules->add($rules->isUnique(['email']));
        $rules->add($rules->existsIn(['professor_id'], 'Professors'));
        return $rules;
    }
}
