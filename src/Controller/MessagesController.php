<?php
declare(strict_types=1);

namespace App\Controller;

use App\Model\Entity\Message;
use App\Model\Table\MessagesTable;
use Cake\Datasource\Exception\RecordNotFoundException;
use Cake\Datasource\ResultSetInterface;
use Cake\Event\EventInterface;
use Cake\Http\Response;

/**
 * Messages Controller
 *
 * @property MessagesTable $Messages
 * @method Message[]|ResultSetInterface paginate($object = null, array $settings = [])
 */
class MessagesController extends AppController
{
    /**
     * Index method
     *
     * @return Response|null|void Renders view
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Rooms'],
        ];
        $messages = $this->paginate($this->Messages);

        $this->set(compact('messages'));
    }

    /**
     * View method
     *
     * @param string|null $id Message id.
     * @return Response|null|void Renders view
     * @throws RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $message = $this->Messages->get($id, [
            'contain' => ['Rooms'],
        ]);

        $this->set(compact('message'));
    }

    /**
     * Add method
     *
     * @return Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $message = $this->Messages->newEntity($this->getRequest()->getQuery(), ['room_id']);
        $this->set(compact('message'));
    }

    public function create(): ?Response
    {
        $message = $this->Messages->newEmptyEntity();
        $message = $this->Messages->patchEntity($message, $this->request->getData());
        $this->set('message', $message);
        $this->Messages->saveOrFail($message);
        if (!$this->isTurbo()) {
            return $this->redirect(['controller' => 'Rooms', 'action' => 'view', $message->room_id]);
        }
        $this->setResponse($this->response->withType('turbo_stream'));
        return null;
    }

    public function beforeRender(EventInterface $event)
    {
        parent::beforeRender($event); // TODO: Change the autogenerated stub
        $this->response->withCharset('')->withType('turbo_stream');
    }

    public function afterFilter(EventInterface $event)
    {

        parent::afterFilter($event);
    }

    /**
     * Edit method
     *
     * @param string|null $id Message id.
     * @return Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $message = $this->Messages->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $message = $this->Messages->patchEntity($message, $this->request->getData());
            if ($this->Messages->save($message)) {
                $this->Flash->success(__('The message has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The message could not be saved. Please, try again.'));
        }
        $rooms = $this->Messages->Rooms->find('list', ['limit' => 200]);
        $this->set(compact('message', 'rooms'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Message id.
     * @return Response|null|void Redirects to index.
     * @throws RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $message = $this->Messages->get($id);
        if ($this->Messages->delete($message)) {
            $this->Flash->success(__('The message has been deleted.'));
        } else {
            $this->Flash->error(__('The message could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}