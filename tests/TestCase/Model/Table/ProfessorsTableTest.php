<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ProfessorsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ProfessorsTable Test Case
 */
class ProfessorsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\ProfessorsTable
     */
    public $Professors;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.professors',
        'app.professor_emails',
        'app.professorships',
        'app.groups',
        'app.courses',
        'app.degrees',
        'app.exams',
        'app.solutions',
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
        $config = TableRegistry::exists('Professors') ? [] : ['className' => 'App\Model\Table\ProfessorsTable'];
        $this->Professors = TableRegistry::get('Professors', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Professors);

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
}
