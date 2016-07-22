<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Professors Model
 *
 * @property \Cake\ORM\Association\HasMany $ProfessorEmails
 * @property \Cake\ORM\Association\HasMany $Professorships
 *
 * @method \App\Model\Entity\Professor get($primaryKey, $options = [])
 * @method \App\Model\Entity\Professor newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Professor[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Professor|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Professor patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Professor[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Professor findOrCreate($search, callable $callback = null)
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

        $this->hasMany('ProfessorEmails', [
            'foreignKey' => 'professor_id'
        ]);
        $this->hasMany('Professorships', [
            'foreignKey' => 'professor_id'
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
            ->requirePresence('first_name', 'create')
            ->notEmpty('first_name');

        $validator
            ->requirePresence('last_name', 'create')
            ->notEmpty('last_name');

        $validator
            ->allowEmpty('office');

        $validator
            ->allowEmpty('website');

        $validator
            ->allowEmpty('notes');

        return $validator;
    }
}
