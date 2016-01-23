<?php
namespace Openweathermap\Test\TestCase\Model\Table;

use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;
use Openweathermap\Model\Table\WeathersitesTable;

/**
 * Openweathermap\Model\Table\WeathersitesTable Test Case
 */
class WeathersitesTableTest extends TestCase
{

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'plugin.openweathermap.weathersites',
        'plugin.openweathermap.weatherdatas'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Weathersites') ? [] : ['className' => 'Openweathermap\Model\Table\WeathersitesTable'];
        $this->Weathersites = TableRegistry::get('Weathersites', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Weathersites);

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
