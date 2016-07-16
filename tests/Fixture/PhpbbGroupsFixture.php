<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * PhpbbGroupsFixture
 *
 */
class PhpbbGroupsFixture extends TestFixture
{

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'group_id' => ['type' => 'integer', 'length' => 8, 'unsigned' => true, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
        'group_type' => ['type' => 'integer', 'length' => 4, 'unsigned' => false, 'null' => false, 'default' => '1', 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'group_founder_manage' => ['type' => 'boolean', 'length' => null, 'null' => false, 'default' => '0', 'comment' => '', 'precision' => null],
        'group_skip_auth' => ['type' => 'boolean', 'length' => null, 'null' => false, 'default' => '0', 'comment' => '', 'precision' => null],
        'group_name' => ['type' => 'string', 'length' => 255, 'null' => false, 'default' => '', 'collate' => 'utf8_bin', 'comment' => '', 'precision' => null, 'fixed' => null],
        'group_desc' => ['type' => 'text', 'length' => null, 'null' => false, 'default' => null, 'collate' => 'utf8_bin', 'comment' => '', 'precision' => null],
        'group_desc_bitfield' => ['type' => 'string', 'length' => 255, 'null' => false, 'default' => '', 'collate' => 'utf8_bin', 'comment' => '', 'precision' => null, 'fixed' => null],
        'group_desc_options' => ['type' => 'integer', 'length' => 11, 'unsigned' => true, 'null' => false, 'default' => '7', 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'group_desc_uid' => ['type' => 'string', 'length' => 8, 'null' => false, 'default' => '', 'collate' => 'utf8_bin', 'comment' => '', 'precision' => null, 'fixed' => null],
        'group_display' => ['type' => 'boolean', 'length' => null, 'null' => false, 'default' => '0', 'comment' => '', 'precision' => null],
        'group_avatar' => ['type' => 'string', 'length' => 255, 'null' => false, 'default' => '', 'collate' => 'utf8_bin', 'comment' => '', 'precision' => null, 'fixed' => null],
        'group_avatar_type' => ['type' => 'string', 'length' => 255, 'null' => false, 'default' => '', 'collate' => 'utf8_bin', 'comment' => '', 'precision' => null, 'fixed' => null],
        'group_avatar_width' => ['type' => 'integer', 'length' => 4, 'unsigned' => true, 'null' => false, 'default' => '0', 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'group_avatar_height' => ['type' => 'integer', 'length' => 4, 'unsigned' => true, 'null' => false, 'default' => '0', 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'group_rank' => ['type' => 'integer', 'length' => 8, 'unsigned' => true, 'null' => false, 'default' => '0', 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'group_colour' => ['type' => 'string', 'length' => 6, 'null' => false, 'default' => '', 'collate' => 'utf8_bin', 'comment' => '', 'precision' => null, 'fixed' => null],
        'group_sig_chars' => ['type' => 'integer', 'length' => 8, 'unsigned' => true, 'null' => false, 'default' => '0', 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'group_receive_pm' => ['type' => 'boolean', 'length' => null, 'null' => false, 'default' => '0', 'comment' => '', 'precision' => null],
        'group_message_limit' => ['type' => 'integer', 'length' => 8, 'unsigned' => true, 'null' => false, 'default' => '0', 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'group_legend' => ['type' => 'integer', 'length' => 8, 'unsigned' => true, 'null' => false, 'default' => '0', 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'group_max_recipients' => ['type' => 'integer', 'length' => 8, 'unsigned' => true, 'null' => false, 'default' => '0', 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        '_indexes' => [
            'group_legend_name' => ['type' => 'index', 'columns' => ['group_legend', 'group_name'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['group_id'], 'length' => []],
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
            'group_id' => 1,
            'group_type' => 1,
            'group_founder_manage' => 1,
            'group_skip_auth' => 1,
            'group_name' => 'Lorem ipsum dolor sit amet',
            'group_desc' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
            'group_desc_bitfield' => 'Lorem ipsum dolor sit amet',
            'group_desc_options' => 1,
            'group_desc_uid' => 'Lorem ',
            'group_display' => 1,
            'group_avatar' => 'Lorem ipsum dolor sit amet',
            'group_avatar_type' => 'Lorem ipsum dolor sit amet',
            'group_avatar_width' => 1,
            'group_avatar_height' => 1,
            'group_rank' => 1,
            'group_colour' => 'Lore',
            'group_sig_chars' => 1,
            'group_receive_pm' => 1,
            'group_message_limit' => 1,
            'group_legend' => 1,
            'group_max_recipients' => 1
        ],
    ];
}
