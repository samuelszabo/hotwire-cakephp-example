<?php
declare(strict_types=1);

namespace App\Test\TestCase\Controller;

use App\Controller\MessagesController;
use Cake\TestSuite\IntegrationTestTrait;
use Cake\TestSuite\TestCase;

/**
 * App\Controller\MessagesController Test Case
 *
 * @uses \App\Controller\MessagesController
 */
class MessagesControllerTest extends TestCase
{
    use IntegrationTestTrait;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.Messages',
        'app.Rooms',
    ];

    /**
     * Test index method
     *
     * @return void
     */
    public function testIndex(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test view method
     *
     * @return void
     */
    public function testView(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test add method
     *
     * @return void
     */
    public function testCreateHtml(): void
    {
        $this->enableSecurityToken();
        $this->enableCsrfToken();
        $this->post('/messages/create', [
            'room_id' => 1,
            'content' => 'New message',
        ]);
        $this->assertRedirect('/rooms/view/1');
    }

    public function testCreateTurbo(): void
    {
        $this->enableSecurityToken();
        $this->enableCsrfToken();
        $this->configRequest([
            'headers' => ['Accept' => 'text/vnd.turbo-stream.html']
        ]);
        $this->post('/messages/create', [
            'room_id' => 1,
            'content' => 'New message',
        ]);
        $this->assertResponseOk();
        $this->assertResponseContains('<template>');
        $this->assertHeader('content-type','text/vnd.turbo-stream.html; charset=UTF-8');
    }

    /**
     * Test edit method
     *
     * @return void
     */
    public function testEdit(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test delete method
     *
     * @return void
     */
    public function testDelete(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
