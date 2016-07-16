<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * PhpbbUsersFixture
 *
 */
class PhpbbUsersFixture extends TestFixture
{

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'user_id' => ['type' => 'integer', 'length' => 8, 'unsigned' => true, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
        'user_type' => ['type' => 'integer', 'length' => 2, 'unsigned' => false, 'null' => false, 'default' => '0', 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'group_id' => ['type' => 'integer', 'length' => 8, 'unsigned' => true, 'null' => false, 'default' => '3', 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'user_permissions' => ['type' => 'text', 'length' => 16777215, 'null' => false, 'default' => null, 'collate' => 'utf8_bin', 'comment' => '', 'precision' => null],
        'user_perm_from' => ['type' => 'integer', 'length' => 8, 'unsigned' => true, 'null' => false, 'default' => '0', 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'user_ip' => ['type' => 'string', 'length' => 40, 'null' => false, 'default' => '', 'collate' => 'utf8_bin', 'comment' => '', 'precision' => null, 'fixed' => null],
        'user_regdate' => ['type' => 'integer', 'length' => 11, 'unsigned' => true, 'null' => false, 'default' => '0', 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'username' => ['type' => 'string', 'length' => 255, 'null' => false, 'default' => '', 'collate' => 'utf8_bin', 'comment' => '', 'precision' => null, 'fixed' => null],
        'username_clean' => ['type' => 'string', 'length' => 255, 'null' => false, 'default' => '', 'collate' => 'utf8_bin', 'comment' => '', 'precision' => null, 'fixed' => null],
        'user_password' => ['type' => 'string', 'length' => 255, 'null' => false, 'default' => '', 'collate' => 'utf8_bin', 'comment' => '', 'precision' => null, 'fixed' => null],
        'user_passchg' => ['type' => 'integer', 'length' => 11, 'unsigned' => true, 'null' => false, 'default' => '0', 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'user_email' => ['type' => 'string', 'length' => 100, 'null' => false, 'default' => '', 'collate' => 'utf8_bin', 'comment' => '', 'precision' => null, 'fixed' => null],
        'user_email_hash' => ['type' => 'biginteger', 'length' => 20, 'unsigned' => false, 'null' => false, 'default' => '0', 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'user_birthday' => ['type' => 'string', 'length' => 10, 'null' => false, 'default' => '', 'collate' => 'utf8_bin', 'comment' => '', 'precision' => null, 'fixed' => null],
        'user_lastvisit' => ['type' => 'integer', 'length' => 11, 'unsigned' => true, 'null' => false, 'default' => '0', 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'user_lastmark' => ['type' => 'integer', 'length' => 11, 'unsigned' => true, 'null' => false, 'default' => '0', 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'user_lastpost_time' => ['type' => 'integer', 'length' => 11, 'unsigned' => true, 'null' => false, 'default' => '0', 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'user_lastpage' => ['type' => 'string', 'length' => 200, 'null' => false, 'default' => '', 'collate' => 'utf8_bin', 'comment' => '', 'precision' => null, 'fixed' => null],
        'user_last_confirm_key' => ['type' => 'string', 'length' => 10, 'null' => false, 'default' => '', 'collate' => 'utf8_bin', 'comment' => '', 'precision' => null, 'fixed' => null],
        'user_last_search' => ['type' => 'integer', 'length' => 11, 'unsigned' => true, 'null' => false, 'default' => '0', 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'user_warnings' => ['type' => 'integer', 'length' => 4, 'unsigned' => false, 'null' => false, 'default' => '0', 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'user_last_warning' => ['type' => 'integer', 'length' => 11, 'unsigned' => true, 'null' => false, 'default' => '0', 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'user_login_attempts' => ['type' => 'integer', 'length' => 4, 'unsigned' => false, 'null' => false, 'default' => '0', 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'user_inactive_reason' => ['type' => 'integer', 'length' => 2, 'unsigned' => false, 'null' => false, 'default' => '0', 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'user_inactive_time' => ['type' => 'integer', 'length' => 11, 'unsigned' => true, 'null' => false, 'default' => '0', 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'user_posts' => ['type' => 'integer', 'length' => 8, 'unsigned' => true, 'null' => false, 'default' => '0', 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'user_lang' => ['type' => 'string', 'length' => 30, 'null' => false, 'default' => '', 'collate' => 'utf8_bin', 'comment' => '', 'precision' => null, 'fixed' => null],
        'user_timezone' => ['type' => 'string', 'length' => 100, 'null' => false, 'default' => '', 'collate' => 'utf8_bin', 'comment' => '', 'precision' => null, 'fixed' => null],
        'user_dateformat' => ['type' => 'string', 'length' => 64, 'null' => false, 'default' => 'd M Y H:i', 'collate' => 'utf8_bin', 'comment' => '', 'precision' => null, 'fixed' => null],
        'user_style' => ['type' => 'integer', 'length' => 8, 'unsigned' => true, 'null' => false, 'default' => '0', 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'user_rank' => ['type' => 'integer', 'length' => 8, 'unsigned' => true, 'null' => false, 'default' => '0', 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'user_colour' => ['type' => 'string', 'length' => 6, 'null' => false, 'default' => '', 'collate' => 'utf8_bin', 'comment' => '', 'precision' => null, 'fixed' => null],
        'user_new_privmsg' => ['type' => 'integer', 'length' => 4, 'unsigned' => false, 'null' => false, 'default' => '0', 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'user_unread_privmsg' => ['type' => 'integer', 'length' => 4, 'unsigned' => false, 'null' => false, 'default' => '0', 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'user_last_privmsg' => ['type' => 'integer', 'length' => 11, 'unsigned' => true, 'null' => false, 'default' => '0', 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'user_message_rules' => ['type' => 'boolean', 'length' => null, 'null' => false, 'default' => '0', 'comment' => '', 'precision' => null],
        'user_full_folder' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => '-3', 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'user_emailtime' => ['type' => 'integer', 'length' => 11, 'unsigned' => true, 'null' => false, 'default' => '0', 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'user_topic_show_days' => ['type' => 'integer', 'length' => 4, 'unsigned' => true, 'null' => false, 'default' => '0', 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'user_topic_sortby_type' => ['type' => 'string', 'length' => 1, 'null' => false, 'default' => 't', 'collate' => 'utf8_bin', 'comment' => '', 'precision' => null, 'fixed' => null],
        'user_topic_sortby_dir' => ['type' => 'string', 'length' => 1, 'null' => false, 'default' => 'd', 'collate' => 'utf8_bin', 'comment' => '', 'precision' => null, 'fixed' => null],
        'user_post_show_days' => ['type' => 'integer', 'length' => 4, 'unsigned' => true, 'null' => false, 'default' => '0', 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'user_post_sortby_type' => ['type' => 'string', 'length' => 1, 'null' => false, 'default' => 't', 'collate' => 'utf8_bin', 'comment' => '', 'precision' => null, 'fixed' => null],
        'user_post_sortby_dir' => ['type' => 'string', 'length' => 1, 'null' => false, 'default' => 'a', 'collate' => 'utf8_bin', 'comment' => '', 'precision' => null, 'fixed' => null],
        'user_notify' => ['type' => 'boolean', 'length' => null, 'null' => false, 'default' => '0', 'comment' => '', 'precision' => null],
        'user_notify_pm' => ['type' => 'boolean', 'length' => null, 'null' => false, 'default' => '1', 'comment' => '', 'precision' => null],
        'user_notify_type' => ['type' => 'integer', 'length' => 4, 'unsigned' => false, 'null' => false, 'default' => '0', 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'user_allow_pm' => ['type' => 'boolean', 'length' => null, 'null' => false, 'default' => '1', 'comment' => '', 'precision' => null],
        'user_allow_viewonline' => ['type' => 'boolean', 'length' => null, 'null' => false, 'default' => '1', 'comment' => '', 'precision' => null],
        'user_allow_viewemail' => ['type' => 'boolean', 'length' => null, 'null' => false, 'default' => '1', 'comment' => '', 'precision' => null],
        'user_allow_massemail' => ['type' => 'boolean', 'length' => null, 'null' => false, 'default' => '1', 'comment' => '', 'precision' => null],
        'user_options' => ['type' => 'integer', 'length' => 11, 'unsigned' => true, 'null' => false, 'default' => '230271', 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'user_avatar' => ['type' => 'string', 'length' => 255, 'null' => false, 'default' => '', 'collate' => 'utf8_bin', 'comment' => '', 'precision' => null, 'fixed' => null],
        'user_avatar_type' => ['type' => 'string', 'length' => 255, 'null' => false, 'default' => '', 'collate' => 'utf8_bin', 'comment' => '', 'precision' => null, 'fixed' => null],
        'user_avatar_width' => ['type' => 'integer', 'length' => 4, 'unsigned' => true, 'null' => false, 'default' => '0', 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'user_avatar_height' => ['type' => 'integer', 'length' => 4, 'unsigned' => true, 'null' => false, 'default' => '0', 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'user_sig' => ['type' => 'text', 'length' => 16777215, 'null' => false, 'default' => null, 'collate' => 'utf8_bin', 'comment' => '', 'precision' => null],
        'user_sig_bbcode_uid' => ['type' => 'string', 'length' => 8, 'null' => false, 'default' => '', 'collate' => 'utf8_bin', 'comment' => '', 'precision' => null, 'fixed' => null],
        'user_sig_bbcode_bitfield' => ['type' => 'string', 'length' => 255, 'null' => false, 'default' => '', 'collate' => 'utf8_bin', 'comment' => '', 'precision' => null, 'fixed' => null],
        'user_jabber' => ['type' => 'string', 'length' => 255, 'null' => false, 'default' => '', 'collate' => 'utf8_bin', 'comment' => '', 'precision' => null, 'fixed' => null],
        'user_actkey' => ['type' => 'string', 'length' => 32, 'null' => false, 'default' => '', 'collate' => 'utf8_bin', 'comment' => '', 'precision' => null, 'fixed' => null],
        'user_newpasswd' => ['type' => 'string', 'length' => 255, 'null' => false, 'default' => '', 'collate' => 'utf8_bin', 'comment' => '', 'precision' => null, 'fixed' => null],
        'user_form_salt' => ['type' => 'string', 'length' => 32, 'null' => false, 'default' => '', 'collate' => 'utf8_bin', 'comment' => '', 'precision' => null, 'fixed' => null],
        'user_new' => ['type' => 'boolean', 'length' => null, 'null' => false, 'default' => '1', 'comment' => '', 'precision' => null],
        'user_reminded' => ['type' => 'integer', 'length' => 4, 'unsigned' => false, 'null' => false, 'default' => '0', 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'user_reminded_time' => ['type' => 'integer', 'length' => 11, 'unsigned' => true, 'null' => false, 'default' => '0', 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        '_indexes' => [
            'user_birthday' => ['type' => 'index', 'columns' => ['user_birthday'], 'length' => []],
            'user_email_hash' => ['type' => 'index', 'columns' => ['user_email_hash'], 'length' => []],
            'user_type' => ['type' => 'index', 'columns' => ['user_type'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['user_id'], 'length' => []],
            'username_clean' => ['type' => 'unique', 'columns' => ['username_clean'], 'length' => []],
        ],
        '_options' => [
            'engine' => 'MyISAM',
            'collation' => 'utf8_bin'
        ],
    ];
    // @codingStandardsIgnoreEnd

    /**
     * Records
     *
     * @var array
     */
    public $records = [
        [
            'user_id' => 1,
            'user_type' => 1,
            'group_id' => 1,
            'user_permissions' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
            'user_perm_from' => 1,
            'user_ip' => 'Lorem ipsum dolor sit amet',
            'user_regdate' => 1,
            'username' => 'Lorem ipsum dolor sit amet',
            'username_clean' => 'Lorem ipsum dolor sit amet',
            'user_password' => 'Lorem ipsum dolor sit amet',
            'user_passchg' => 1,
            'user_email' => 'Lorem ipsum dolor sit amet',
            'user_email_hash' => 1,
            'user_birthday' => 'Lorem ip',
            'user_lastvisit' => 1,
            'user_lastmark' => 1,
            'user_lastpost_time' => 1,
            'user_lastpage' => 'Lorem ipsum dolor sit amet',
            'user_last_confirm_key' => 'Lorem ip',
            'user_last_search' => 1,
            'user_warnings' => 1,
            'user_last_warning' => 1,
            'user_login_attempts' => 1,
            'user_inactive_reason' => 1,
            'user_inactive_time' => 1,
            'user_posts' => 1,
            'user_lang' => 'Lorem ipsum dolor sit amet',
            'user_timezone' => 'Lorem ipsum dolor sit amet',
            'user_dateformat' => 'Lorem ipsum dolor sit amet',
            'user_style' => 1,
            'user_rank' => 1,
            'user_colour' => 'Lore',
            'user_new_privmsg' => 1,
            'user_unread_privmsg' => 1,
            'user_last_privmsg' => 1,
            'user_message_rules' => 1,
            'user_full_folder' => 1,
            'user_emailtime' => 1,
            'user_topic_show_days' => 1,
            'user_topic_sortby_type' => 'Lorem ipsum dolor sit ame',
            'user_topic_sortby_dir' => 'Lorem ipsum dolor sit ame',
            'user_post_show_days' => 1,
            'user_post_sortby_type' => 'Lorem ipsum dolor sit ame',
            'user_post_sortby_dir' => 'Lorem ipsum dolor sit ame',
            'user_notify' => 1,
            'user_notify_pm' => 1,
            'user_notify_type' => 1,
            'user_allow_pm' => 1,
            'user_allow_viewonline' => 1,
            'user_allow_viewemail' => 1,
            'user_allow_massemail' => 1,
            'user_options' => 1,
            'user_avatar' => 'Lorem ipsum dolor sit amet',
            'user_avatar_type' => 'Lorem ipsum dolor sit amet',
            'user_avatar_width' => 1,
            'user_avatar_height' => 1,
            'user_sig' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
            'user_sig_bbcode_uid' => 'Lorem ',
            'user_sig_bbcode_bitfield' => 'Lorem ipsum dolor sit amet',
            'user_jabber' => 'Lorem ipsum dolor sit amet',
            'user_actkey' => 'Lorem ipsum dolor sit amet',
            'user_newpasswd' => 'Lorem ipsum dolor sit amet',
            'user_form_salt' => 'Lorem ipsum dolor sit amet',
            'user_new' => 1,
            'user_reminded' => 1,
            'user_reminded_time' => 1
        ],
    ];
}
