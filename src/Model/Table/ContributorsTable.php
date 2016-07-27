<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Contributors Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Exts
 * @property \Cake\ORM\Association\HasMany $Solutions
 *
 * @method \App\Model\Entity\Contributor get($primaryKey, $options = [])
 * @method \App\Model\Entity\Contributor newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Contributor[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Contributor|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Contributor patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Contributor[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Contributor findOrCreate($search, callable $callback = null)
 */
class ContributorsTable extends Table
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

        $this->table('contributors');
        $this->displayField('id');
        $this->primaryKey('id');

        //$this->belongsTo('Exts', [
        //    'foreignKey' => 'ext_id',
        //    'joinType' => 'INNER'
        //]);
        
        $this->hasMany('Solutions', [
            'foreignKey' => 'contributor_id'
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
            ->requirePresence('username', 'create')
            ->notEmpty('username');


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
        $rules->add($rules->isUnique(['username']));
        //$rules->add($rules->existsIn(['ext_id'], 'Exts'));
        return $rules;
    }
}
