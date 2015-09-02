<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Clients Controller
 *
 * @property \App\Model\Table\ClientsTable $Clients
 */
class ClientsController extends AppController
{

    public $components = array(
        'Search.Prg'
    );

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $this->Prg->commonProcess();

        $this->paginate = [
            
            'contain' => ['Cities', 'States', 'Countries']
        ];

        $this->set('clients', $this->paginate($this->Clients->find('searchable', $this->Prg->parsedParams())));
        //$this->set('clients', $this->paginate($this->Clients));
        $this->set('_serialize', ['clients']);
    }

    public function resources()
    {
        $this->Prg->commonProcess();

        $this->paginate = [
            'conditions' => ['Clients.client_type' => 'resource'],
            'contain' => ['Marketings', 'Cities', 'States', 'Countries']
        ];

        $this->set('clients', $this->paginate($this->Clients->find('searchable', $this->Prg->parsedParams())));
        //$this->set('clients', $this->paginate($this->Clients));
        $this->set('_serialize', ['clients']);
    }

    public function resource_view($id = null)
    {
        $client = $this->Clients->get($id, [
            //'conditions' => ['Clients.client_type' => 'resource'],
            'contain' => ['Marketings', 'Cities', 'States', 'Countries',]
        ]);
        $this->set('client', $client);
        $this->set('_serialize', ['client']);
    }

    /**
     * View method
     *
     * @param string|null $id Client id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $client = $this->Clients->get($id, [
            'contain' => ['Cities', 'States', 'Countries', 'Sales', 'Sales.Items']
        ]);
        $this->set('client', $client);
        $this->set('_serialize', ['client']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $client = $this->Clients->newEntity();
        if ($this->request->is('post')) {
            $client = $this->Clients->patchEntity($client, $this->request->data);
            if ($this->Clients->save($client)) {
                $this->Flash->success(__('The client has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The client could not be saved. Please, try again.'));
            }
        }
        $cities = $this->Clients->Cities->find('list', ['limit' => 200]);
        $states = $this->Clients->States->find('list', ['limit' => 200]);
        $countries = $this->Clients->Countries->find('list', ['limit' => 200]);
        $this->set(compact('client', 'cities', 'states', 'countries'));
        $this->set('_serialize', ['client']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Client id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $client = $this->Clients->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $client = $this->Clients->patchEntity($client, $this->request->data);
            if ($this->Clients->save($client)) {
                $this->Flash->success(__('The client has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The client could not be saved. Please, try again.'));
            }
        }
        $cities = $this->Clients->Cities->find('list', ['limit' => 200]);
        $states = $this->Clients->States->find('list', ['limit' => 200]);
        $countries = $this->Clients->Countries->find('list', ['limit' => 200]);
        $this->set(compact('client', 'cities', 'states', 'countries'));
        $this->set('_serialize', ['client']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Client id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $client = $this->Clients->get($id);
        if ($this->Clients->delete($client)) {
            $this->Flash->success(__('The client has been deleted.'));
        } else {
            $this->Flash->error(__('The client could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }

    public function isAuthorized($user)
    {

        // Admin can access every action
        if (isset($user['role']) && in_array($user['role'], ['admin','marketing'])) {
            return true;
        }
        
        return parent::isAuthorized($user);
    }
}
