<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * HostingServers Controller
 *
 * @property \App\Model\Table\HostingServersTable $HostingServers
 */
class HostingServersController extends AppController
{

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $this->set('hostingServers', $this->paginate($this->HostingServers));
        $this->set('_serialize', ['hostingServers']);
    }

    /**
     * View method
     *
     * @param string|null $id Hosting Server id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $hostingServer = $this->HostingServers->get($id, [
            'contain' => ['Hostings']
        ]);
        $this->set('hostingServer', $hostingServer);
        $this->set('_serialize', ['hostingServer']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $hostingServer = $this->HostingServers->newEntity();
        if ($this->request->is('post')) {
            $hostingServer = $this->HostingServers->patchEntity($hostingServer, $this->request->data);
            if ($this->HostingServers->save($hostingServer)) {
                $this->Flash->success(__('The hosting server has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The hosting server could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('hostingServer'));
        $this->set('_serialize', ['hostingServer']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Hosting Server id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $hostingServer = $this->HostingServers->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $hostingServer = $this->HostingServers->patchEntity($hostingServer, $this->request->data);
            if ($this->HostingServers->save($hostingServer)) {
                $this->Flash->success(__('The hosting server has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The hosting server could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('hostingServer'));
        $this->set('_serialize', ['hostingServer']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Hosting Server id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $hostingServer = $this->HostingServers->get($id);
        if ($this->HostingServers->delete($hostingServer)) {
            $this->Flash->success(__('The hosting server has been deleted.'));
        } else {
            $this->Flash->error(__('The hosting server could not be deleted. Please, try again.'));
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
