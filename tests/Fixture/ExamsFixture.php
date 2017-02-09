<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * ExamsFixture
 *
 */
class ExamsFixture extends TestFixture
{

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
        'professorship_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => '0', 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'url' => ['type' => 'string', 'length' => 512, 'null' => true, 'default' => null, 'collate' => 'latin1_swedish_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'path' => ['type' => 'string', 'length' => 512, 'null' => true, 'default' => null, 'collate' => 'latin1_swedish_ci', 'comment' => 'path to local file, if uploaded', 'precision' => null, 'fixed' => null],
        'isExercise' => ['type' => 'boolean', 'length' => null, 'null' => false, 'default' => '0', 'comment' => 'flag for assignment', 'precision' => null],
        'date' => ['type' => 'date', 'length' => null, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null],
        'info' => ['type' => 'string', 'length' => 256, 'null' => true, 'default' => null, 'collate' => 'latin1_swedish_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        '_indexes' => [
            'FK_professorship' => ['type' => 'index', 'columns' => ['professorship_id'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
            'FK_professorship' => ['type' => 'foreign', 'columns' => ['professorship_id'], 'references' => ['professorships', 'id'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
        ],
        '_options' => [
            'engine' => 'InnoDB',
            'collation' => 'latin1_swedish_ci'
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
            'professorship_id' => 1,
            'url' => 'Lorem ipsum dolor sit amet',
            'path' => 'Lorem ipsum dolor sit amet',
            'isExercise' => 1,
            'date' => '2017-02-08',
            'info' => 'Lorem ipsum dolor sit amet'
        ],
    ];
}
