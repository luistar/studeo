<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ProfessorshipsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ProfessorshipsTable Test Case
 */
class ProfessorshipsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\ProfessorshipsTable
     */
    public $Professorships;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.professorships',
        'app.groups',
        'app.courses',
        'app.degrees',
        'app.professors',
        'app.professor_emails',
        'app.exams',
        'app.solutions'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Professorships') ? [] : ['className' => 'App\Model\Table\ProfessorshipsTable'];
        $this->Professorships = TableRegistry::get('Professorships', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Professorships);

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
