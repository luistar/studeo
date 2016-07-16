<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * PhpbbGroups Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Groups
 *
 * @method \App\Model\Entity\PhpbbGroup get($primaryKey, $options = [])
 * @method \App\Model\Entity\PhpbbGroup newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\PhpbbGroup[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\PhpbbGroup|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\PhpbbGroup patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\PhpbbGroup[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\PhpbbGroup findOrCreate($search, callable $callback = null)
 */
class PhpbbGroupsTable extends Table
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

        $this->table('phpbb_groups');
        $this->displayField('group_id');
        $this->primaryKey('group_id');

        $this->belongsTo('Groups', [
            'foreignKey' => 'group_id',
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
            ->integer('group_type')
            ->requirePresence('group_type', 'create')
            ->notEmpty('group_type');

        $validator
            ->boolean('group_founder_manage')
            ->requirePresence('group_founder_manage', 'create')
            ->notEmpty('group_founder_manage');

        $validator
            ->boolean('group_skip_auth')
            ->requirePresence('group_skip_auth', 'create')
            ->notEmpty('group_skip_auth');

        $validator
            ->requirePresence('group_name', 'create')
            ->notEmpty('group_name');

        $validator
            ->requirePresence('group_desc', 'create')
            ->notEmpty('group_desc');

        $validator
            ->requirePresence('group_desc_bitfield', 'create')
            ->notEmpty('group_desc_bitfield');

        $validator
            ->integer('group_desc_options')
            ->requirePresence('group_desc_options', 'create')
            ->notEmpty('group_desc_options');

        $validator
            ->requirePresence('group_desc_uid', 'create')
            ->notEmpty('group_desc_uid');

        $validator
            ->boolean('group_display')
            ->requirePresence('group_display', 'create')
            ->notEmpty('group_display');

        $validator
            ->requirePresence('group_avatar', 'create')
            ->notEmpty('group_avatar');

        $validator
            ->requirePresence('group_avatar_type', 'create')
            ->notEmpty('group_avatar_type');

        $validator
            ->integer('group_avatar_width')
            ->requirePresence('group_avatar_width', 'create')
            ->notEmpty('group_avatar_width');

        $validator
            ->integer('group_avatar_height')
            ->requirePresence('group_avatar_height', 'create')
            ->notEmpty('group_avatar_height');

        $validator
            ->integer('group_rank')
            ->requirePresence('group_rank', 'create')
            ->notEmpty('group_rank');

        $validator
            ->requirePresence('group_colour', 'create')
            ->notEmpty('group_colour');

        $validator
            ->integer('group_sig_chars')
            ->requirePresence('group_sig_chars', 'create')
            ->notEmpty('group_sig_chars');

        $validator
            ->boolean('group_receive_pm')
            ->requirePresence('group_receive_pm', 'create')
            ->notEmpty('group_receive_pm');

        $validator
            ->integer('group_message_limit')
            ->requirePresence('group_message_limit', 'create')
            ->notEmpty('group_message_limit');

        $validator
            ->integer('group_legend')
            ->requirePresence('group_legend', 'create')
            ->notEmpty('group_legend');

        $validator
            ->integer('group_max_recipients')
            ->requirePresence('group_max_recipients', 'create')
            ->notEmpty('group_max_recipients');

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
        return $rules;
    }

    /**
     * Returns the database connection name to use by default.
     *
     * @return string
     */
    public static function defaultConnectionName()
    {
        return 'phpbb_db';
    }
}
