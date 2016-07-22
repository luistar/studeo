<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\SolutionsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\SolutionsTable Test Case
 */
class SolutionsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\SolutionsTable
     */
    public $Solutions;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.solutions',
        'app.exams',
        'app.professorships',
        'app.groups',
        'app.courses',
        'app.degrees',
        'app.professors',
        'app.professor_emails',
        'app.contributors',
        'app.exts'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Solutions') ? [] : ['className' => 'App\Model\Table\SolutionsTable'];
        $this->Solutions = TableRegistry::get('Solutions', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Solutions);

        parent::tearDown();
    }

    /**
     * Test initialize method
     *
     * @return void
     */
    public function testInitialize()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
