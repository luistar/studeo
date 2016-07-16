<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * PhpbbGroup Entity
 *
 * @property int $group_id
 * @property int $group_type
 * @property bool $group_founder_manage
 * @property bool $group_skip_auth
 * @property string $group_name
 * @property string $group_desc
 * @property string $group_desc_bitfield
 * @property int $group_desc_options
 * @property string $group_desc_uid
 * @property bool $group_display
 * @property string $group_avatar
 * @property string $group_avatar_type
 * @property int $group_avatar_width
 * @property int $group_avatar_height
 * @property int $group_rank
 * @property string $group_colour
 * @property int $group_sig_chars
 * @property bool $group_receive_pm
 * @property int $group_message_limit
 * @property int $group_legend
 * @property int $group_max_recipients
 *
 * @property \App\Model\Entity\Group $group
 */
class PhpbbGroup extends Entity
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
        'group_id' => false
    ];
}
