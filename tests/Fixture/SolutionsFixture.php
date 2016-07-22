<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * SolutionsFixture
 *
 */
class SolutionsFixture extends TestFixture
{

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
        'exam_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'url' => ['type' => 'string', 'length' => 512, 'null' => false, 'default' => null, 'collate' => 'utf8_unicode_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'number' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => '0', 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'contributor_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'is_deleted' => ['type' => 'boolean', 'length' => null, 'null' => false, 'default' => '0', 'comment' => 'Boolean flag used for soft-delete', 'precision' => null],
        '_indexes' => [
            'contributor_FK' => ['type' => 'index', 'columns' => ['contributor_id'], 'length' => []],
            'exam_FK' => ['type' => 'index', 'columns' => ['exam_id'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
            'contributor_FK' => ['type' => 'foreign', 'columns' => ['contributor_id'], 'references' => ['contributors', 'id'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
            'exam_FK' => ['type' => 'foreign', 'columns' => ['exam_id'], 'references' => ['exams', 'id'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
        ],
        '_options' => [
            'engine' => 'InnoDB',
            'collation' => 'utf8_unicode_ci'
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
            'id' => 1,
            'exam_id' => 1,
            'url' => 'Lorem ipsum dolor sit amet',
            'number' => 1,
            'contributor_id' => 1,
            'is_deleted' => 1
        ],
    ];
}
