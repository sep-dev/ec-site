<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\TblclientTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\TblclientTable Test Case
 */
class TblclientTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\TblclientTable
     */
    public $Tblclient;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.tblclient'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Tblclient') ? [] : ['className' => 'App\Model\Table\TblclientTable'];
        $this->Tblclient = TableRegistry::get('Tblclient', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Tblclient);

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
