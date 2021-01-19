<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\RoomsTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\RoomsTable Test Case
 */
class RoomsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\RoomsTable
     */
    protected $Rooms;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.Rooms',
        'app.Messages',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Rooms') ? [] : ['className' => RoomsTable::class];
        $this->Rooms = $this->getTableLocator()->get('Rooms', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->Rooms);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
