<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ContributorsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ContributorsTable Test Case
 */
class ContributorsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\ContributorsTable
     */
    public $Contributors;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.contributors',
        'app.exts',
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
        $config = TableRegistry::exists('Contributors') ? [] : ['className' => 'App\Model\Table\ContributorsTable'];
        $this->Contributors = TableRegistry::get('Contributors', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Contributors);

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
