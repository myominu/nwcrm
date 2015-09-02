<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * MarketResources Controller
 *
 * @property \App\Model\Table\MarketResourcesTable $MarketResources
 */
class MarketResourcesController extends AppController
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

        $this->set('marketResources', $this->paginate($this->MarketResources->find('searchable', $this->Prg->parsedParams())));

        //$this->set('marketResources', $this->paginate($this->MarketResources));
        $this->set('_serialize', ['marketResources']);
    }

    /**
     * View method
     *
     * @param string|null $id Market Resource id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $marketResource = $this->MarketResources->get($id, [
            'contain' => []
        ]);
        $this->set('marketResource', $marketResource);
        $this->set('_serialize', ['marketResource']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $marketResource = $this->MarketResources->newEntity();
        if ($this->request->is('post')) {
            $marketResource = $this->MarketResources->patchEntity($marketResource, $this->request->data);
            if ($this->MarketResources->save($marketResource)) {
                $this->Flash->success(__('The market resource has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The market resource could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('marketResource'));
        $this->set('_serialize', ['marketResource']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Market Resource id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $marketResource = $this->MarketResources->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $marketResource = $this->MarketResources->patchEntity($marketResource, $this->request->data);
            if ($this->MarketResources->save($marketResource)) {
                $this->Flash->success(__('The market resource has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The market resource could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('marketResource'));
        $this->set('_serialize', ['marketResource']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Market Resource id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $marketResource = $this->MarketResources->get($id);
        if ($this->MarketResources->delete($marketResource)) {
            $this->Flash->success(__('The market resource has been deleted.'));
        } else {
            $this->Flash->error(__('The market resource could not be deleted. Please, try again.'));
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
