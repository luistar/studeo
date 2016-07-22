<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ProfessorEmailsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ProfessorEmailsTable Test Case
 */
class ProfessorEmailsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\ProfessorEmailsTable
     */
    public $ProfessorEmails;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.professor_emails',
        'app.professors',
        'app.professorships',
        'app.groups',
        'app.courses',
        'app.degrees',
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
        $config = TableRegistry::exists('ProfessorEmails') ? [] : ['className' => 'App\Model\Table\ProfessorEmailsTable'];
        $this->ProfessorEmails = TableRegistry::get('ProfessorEmails', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->ProfessorEmails);

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
