<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\PhpbbUsersTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\PhpbbUsersTable Test Case
 */
class PhpbbUsersTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\PhpbbUsersTable
     */
    public $PhpbbUsers;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.phpbb_users',
        'app.users',
        'app.groups'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('PhpbbUsers') ? [] : ['className' => 'App\Model\Table\PhpbbUsersTable'];
        $this->PhpbbUsers = TableRegistry::get('PhpbbUsers', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->PhpbbUsers);

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

    /**
     * Test defaultConnectionName method
     *
     * @return void
     */
    public function testDefaultConnectionName()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
