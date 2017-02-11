<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;
use Cake\Core\Configure;
use Cake\Datasource\ConnectionManager;

/**
 * PhpbbUsers Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Users
 * @property \Cake\ORM\Association\BelongsTo $Groups
 *
 * @method \App\Model\Entity\PhpbbUser get($primaryKey, $options = [])
 * @method \App\Model\Entity\PhpbbUser newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\PhpbbUser[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\PhpbbUser|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\PhpbbUser patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\PhpbbUser[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\PhpbbUser findOrCreate($search, callable $callback = null)
 */
class PhpbbUsersTable extends Table
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
        
        //gets table name in the phpbb database
        $this->table(ConnectionManager::get($this->defaultConnectionName())->config()['phpbbTablePrefix'].'_users');
        $this->displayField('user_id');
        $this->primaryKey('user_id');

        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('PhpbbGroups', [
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
            ->integer('user_type')
            ->requirePresence('user_type', 'create')
            ->notEmpty('user_type');

        $validator
            ->requirePresence('user_permissions', 'create')
            ->notEmpty('user_permissions');

        $validator
            ->integer('user_perm_from')
            ->requirePresence('user_perm_from', 'create')
            ->notEmpty('user_perm_from');

        $validator
            ->requirePresence('user_ip', 'create')
            ->notEmpty('user_ip');

        $validator
            ->integer('user_regdate')
            ->requirePresence('user_regdate', 'create')
            ->notEmpty('user_regdate');

        $validator
            ->requirePresence('username', 'create')
            ->notEmpty('username');

        $validator
            ->requirePresence('username_clean', 'create')
            ->notEmpty('username_clean')
            ->add('username_clean', 'unique', ['rule' => 'validateUnique', 'provider' => 'table']);

        $validator
            ->requirePresence('user_password', 'create')
            ->notEmpty('user_password');

        $validator
            ->integer('user_passchg')
            ->requirePresence('user_passchg', 'create')
            ->notEmpty('user_passchg');

        $validator
            ->requirePresence('user_email', 'create')
            ->notEmpty('user_email');

        $validator
            ->requirePresence('user_email_hash', 'create')
            ->notEmpty('user_email_hash');

        $validator
            ->requirePresence('user_birthday', 'create')
            ->notEmpty('user_birthday');

        $validator
            ->integer('user_lastvisit')
            ->requirePresence('user_lastvisit', 'create')
            ->notEmpty('user_lastvisit');

        $validator
            ->integer('user_lastmark')
            ->requirePresence('user_lastmark', 'create')
            ->notEmpty('user_lastmark');

        $validator
            ->integer('user_lastpost_time')
            ->requirePresence('user_lastpost_time', 'create')
            ->notEmpty('user_lastpost_time');

        $validator
            ->requirePresence('user_lastpage', 'create')
            ->notEmpty('user_lastpage');

        $validator
            ->requirePresence('user_last_confirm_key', 'create')
            ->notEmpty('user_last_confirm_key');

        $validator
            ->integer('user_last_search')
            ->requirePresence('user_last_search', 'create')
            ->notEmpty('user_last_search');

        $validator
            ->integer('user_warnings')
            ->requirePresence('user_warnings', 'create')
            ->notEmpty('user_warnings');

        $validator
            ->integer('user_last_warning')
            ->requirePresence('user_last_warning', 'create')
            ->notEmpty('user_last_warning');

        $validator
            ->integer('user_login_attempts')
            ->requirePresence('user_login_attempts', 'create')
            ->notEmpty('user_login_attempts');

        $validator
            ->integer('user_inactive_reason')
            ->requirePresence('user_inactive_reason', 'create')
            ->notEmpty('user_inactive_reason');

        $validator
            ->integer('user_inactive_time')
            ->requirePresence('user_inactive_time', 'create')
            ->notEmpty('user_inactive_time');

        $validator
            ->integer('user_posts')
            ->requirePresence('user_posts', 'create')
            ->notEmpty('user_posts');

        $validator
            ->requirePresence('user_lang', 'create')
            ->notEmpty('user_lang');

        $validator
            ->requirePresence('user_timezone', 'create')
            ->notEmpty('user_timezone');

        $validator
            ->requirePresence('user_dateformat', 'create')
            ->notEmpty('user_dateformat');

        $validator
            ->integer('user_style')
            ->requirePresence('user_style', 'create')
            ->notEmpty('user_style');

        $validator
            ->integer('user_rank')
            ->requirePresence('user_rank', 'create')
            ->notEmpty('user_rank');

        $validator
            ->requirePresence('user_colour', 'create')
            ->notEmpty('user_colour');

        $validator
            ->integer('user_new_privmsg')
            ->requirePresence('user_new_privmsg', 'create')
            ->notEmpty('user_new_privmsg');

        $validator
            ->integer('user_unread_privmsg')
            ->requirePresence('user_unread_privmsg', 'create')
            ->notEmpty('user_unread_privmsg');

        $validator
            ->integer('user_last_privmsg')
            ->requirePresence('user_last_privmsg', 'create')
            ->notEmpty('user_last_privmsg');

        $validator
            ->boolean('user_message_rules')
            ->requirePresence('user_message_rules', 'create')
            ->notEmpty('user_message_rules');

        $validator
            ->integer('user_full_folder')
            ->requirePresence('user_full_folder', 'create')
            ->notEmpty('user_full_folder');

        $validator
            ->integer('user_emailtime')
            ->requirePresence('user_emailtime', 'create')
            ->notEmpty('user_emailtime');

        $validator
            ->integer('user_topic_show_days')
            ->requirePresence('user_topic_show_days', 'create')
            ->notEmpty('user_topic_show_days');

        $validator
            ->requirePresence('user_topic_sortby_type', 'create')
            ->notEmpty('user_topic_sortby_type');

        $validator
            ->requirePresence('user_topic_sortby_dir', 'create')
            ->notEmpty('user_topic_sortby_dir');

        $validator
            ->integer('user_post_show_days')
            ->requirePresence('user_post_show_days', 'create')
            ->notEmpty('user_post_show_days');

        $validator
            ->requirePresence('user_post_sortby_type', 'create')
            ->notEmpty('user_post_sortby_type');

        $validator
            ->requirePresence('user_post_sortby_dir', 'create')
            ->notEmpty('user_post_sortby_dir');

        $validator
            ->boolean('user_notify')
            ->requirePresence('user_notify', 'create')
            ->notEmpty('user_notify');

        $validator
            ->boolean('user_notify_pm')
            ->requirePresence('user_notify_pm', 'create')
            ->notEmpty('user_notify_pm');

        $validator
            ->integer('user_notify_type')
            ->requirePresence('user_notify_type', 'create')
            ->notEmpty('user_notify_type');

        $validator
            ->boolean('user_allow_pm')
            ->requirePresence('user_allow_pm', 'create')
            ->notEmpty('user_allow_pm');

        $validator
            ->boolean('user_allow_viewonline')
            ->requirePresence('user_allow_viewonline', 'create')
            ->notEmpty('user_allow_viewonline');

        $validator
            ->boolean('user_allow_viewemail')
            ->requirePresence('user_allow_viewemail', 'create')
            ->notEmpty('user_allow_viewemail');

        $validator
            ->boolean('user_allow_massemail')
            ->requirePresence('user_allow_massemail', 'create')
            ->notEmpty('user_allow_massemail');

        $validator
            ->integer('user_options')
            ->requirePresence('user_options', 'create')
            ->notEmpty('user_options');

        $validator
            ->requirePresence('user_avatar', 'create')
            ->notEmpty('user_avatar');

        $validator
            ->requirePresence('user_avatar_type', 'create')
            ->notEmpty('user_avatar_type');

        $validator
            ->integer('user_avatar_width')
            ->requirePresence('user_avatar_width', 'create')
            ->notEmpty('user_avatar_width');

        $validator
            ->integer('user_avatar_height')
            ->requirePresence('user_avatar_height', 'create')
            ->notEmpty('user_avatar_height');

        $validator
            ->requirePresence('user_sig', 'create')
            ->notEmpty('user_sig');

        $validator
            ->requirePresence('user_sig_bbcode_uid', 'create')
            ->notEmpty('user_sig_bbcode_uid');

        $validator
            ->requirePresence('user_sig_bbcode_bitfield', 'create')
            ->notEmpty('user_sig_bbcode_bitfield');

        $validator
            ->requirePresence('user_jabber', 'create')
            ->notEmpty('user_jabber');

        $validator
            ->requirePresence('user_actkey', 'create')
            ->notEmpty('user_actkey');

        $validator
            ->requirePresence('user_newpasswd', 'create')
            ->notEmpty('user_newpasswd');

        $validator
            ->requirePresence('user_form_salt', 'create')
            ->notEmpty('user_form_salt');

        $validator
            ->boolean('user_new')
            ->requirePresence('user_new', 'create')
            ->notEmpty('user_new');

        $validator
            ->integer('user_reminded')
            ->requirePresence('user_reminded', 'create')
            ->notEmpty('user_reminded');

        $validator
            ->integer('user_reminded_time')
            ->requirePresence('user_reminded_time', 'create')
            ->notEmpty('user_reminded_time');

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
        $rules->add($rules->isUnique(['username_clean']));
        $rules->add($rules->existsIn(['user_id'], 'Users'));
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
    
    
    /**
     * Custom finder for authentication. Includes PhpbbGroup info.
     * 
     * @param \Cake\ORM\Query $query
     * @param array $options
     * @return \Cake\ORM\Query
     */
    public function findAuth(Query $query, array $options)
    {
    	return $query->contain(['PhpbbGroups']);
    }
}
