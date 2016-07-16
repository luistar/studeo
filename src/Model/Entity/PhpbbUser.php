<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * PhpbbUser Entity
 *
 * @property int $user_id
 * @property int $user_type
 * @property int $group_id
 * @property string $user_permissions
 * @property int $user_perm_from
 * @property string $user_ip
 * @property int $user_regdate
 * @property string $username
 * @property string $username_clean
 * @property string $user_password
 * @property int $user_passchg
 * @property string $user_email
 * @property int $user_email_hash
 * @property string $user_birthday
 * @property int $user_lastvisit
 * @property int $user_lastmark
 * @property int $user_lastpost_time
 * @property string $user_lastpage
 * @property string $user_last_confirm_key
 * @property int $user_last_search
 * @property int $user_warnings
 * @property int $user_last_warning
 * @property int $user_login_attempts
 * @property int $user_inactive_reason
 * @property int $user_inactive_time
 * @property int $user_posts
 * @property string $user_lang
 * @property string $user_timezone
 * @property string $user_dateformat
 * @property int $user_style
 * @property int $user_rank
 * @property string $user_colour
 * @property int $user_new_privmsg
 * @property int $user_unread_privmsg
 * @property int $user_last_privmsg
 * @property bool $user_message_rules
 * @property int $user_full_folder
 * @property int $user_emailtime
 * @property int $user_topic_show_days
 * @property string $user_topic_sortby_type
 * @property string $user_topic_sortby_dir
 * @property int $user_post_show_days
 * @property string $user_post_sortby_type
 * @property string $user_post_sortby_dir
 * @property bool $user_notify
 * @property bool $user_notify_pm
 * @property int $user_notify_type
 * @property bool $user_allow_pm
 * @property bool $user_allow_viewonline
 * @property bool $user_allow_viewemail
 * @property bool $user_allow_massemail
 * @property int $user_options
 * @property string $user_avatar
 * @property string $user_avatar_type
 * @property int $user_avatar_width
 * @property int $user_avatar_height
 * @property string $user_sig
 * @property string $user_sig_bbcode_uid
 * @property string $user_sig_bbcode_bitfield
 * @property string $user_jabber
 * @property string $user_actkey
 * @property string $user_newpasswd
 * @property string $user_form_salt
 * @property bool $user_new
 * @property int $user_reminded
 * @property int $user_reminded_time
 *
 * @property \App\Model\Entity\User $user
 * @property \App\Model\Entity\Group $group
 */
class PhpbbUser extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        '*' => true,
        'user_id' => false
    ];
}
