<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Hostings Controller
 *
 * @property \App\Model\Table\HostingsTable $Hostings
 */
class HostingsController extends AppController
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
            'contain' => ['Sales', 'HostingServers']
        ];

        $this->set('hostings', $this->paginate($this->Hostings->find('searchable', $this->Prg->parsedParams())));        
        //$this->set('hostings', $this->paginate($this->Hostings));
        $this->set('_serialize', ['hostings']);
    }

    /**
     * View method
     *
     * @param string|null $id Hosting id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $hosting = $this->Hostings->get($id, [
            'contain' => ['Sales', 'HostingServers']
        ]);
        $this->set('hosting', $hosting);
        $this->set('_serialize', ['hosting']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $hosting = $this->Hostings->newEntity();
        if ($this->request->is('post')) {
            $hosting = $this->Hostings->patchEntity($hosting, $this->request->data);
            if ($this->Hostings->save($hosting)) {
                $this->Flash->success(__('The hosting has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The hosting could not be saved. Please, try again.'));
            }
        }
        $sales = $this->Hostings->Sales->find('list', ['limit' => 200]);
        $hostingServers = $this->Hostings->HostingServers->find('list', ['limit' => 200]);
        $this->set(compact('hosting', 'sales', 'hostingServers'));
        $this->set('_serialize', ['hosting']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Hosting id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $hosting = $this->Hostings->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $hosting = $this->Hostings->patchEntity($hosting, $this->request->data);
            if ($this->Hostings->save($hosting)) {
                $this->Flash->success(__('The hosting has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The hosting could not be saved. Please, try again.'));
            }
        }
        $sales = $this->Hostings->Sales->find('list', ['limit' => 200]);
        $hostingServers = $this->Hostings->HostingServers->find('list', ['limit' => 200]);
        $this->set(compact('hosting', 'sales', 'hostingServers'));
        $this->set('_serialize', ['hosting']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Hosting id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $hosting = $this->Hostings->get($id);
        if ($this->Hostings->delete($hosting)) {
            $this->Flash->success(__('The hosting has been deleted.'));
        } else {
            $this->Flash->error(__('The hosting could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }

    public function isAuthorized($user)
    {

        // Admin can access every action
        if (isset($user['role']) && in_array($user['role'], ['admin','developer'])) {
            return true;
        }
        
        return parent::isAuthorized($user);
    }
}
