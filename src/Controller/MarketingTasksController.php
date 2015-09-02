<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * MarketingTasks Controller
 *
 * @property \App\Model\Table\MarketingTasksTable $MarketingTasks
 */
class MarketingTasksController extends AppController
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
            'contain' => ['Clients', 'MarketResources', 'Users'],
            'order' => ['MarketingTasks.appointment_date' => 'DESC']
        ];

        $this->set('marketingTasks', $this->paginate($this->MarketingTasks->find('searchable', $this->Prg->parsedParams())));
        //$this->set('marketingTasks', $this->paginate($this->MarketingTasks));
        $this->set('_serialize', ['marketingTasks']);
    }

    /**
     * View method
     *
     * @param string|null $id Marketing Task id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $marketingTask = $this->MarketingTasks->get($id, [
            'contain' => ['Clients', 'MarketResources', 'Users']
        ]);
        $this->set('marketingTask', $marketingTask);
        $this->set('_serialize', ['marketingTask']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $this->loadModel('Masters');

        $task_type = $this->Masters->find('item', [
            'name' => 'Task type',
            ]);

        $marketingTask = $this->MarketingTasks->newEntity();
        if ($this->request->is('post')) {
            $marketingTask = $this->MarketingTasks->patchEntity($marketingTask, $this->request->data);
            $marketingTask->user_id = $this->Auth->user('id');
            if ($this->MarketingTasks->save($marketingTask)) {
                $this->Flash->success(__('The marketing task has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The marketing task could not be saved. Please, try again.'));
            }
        }
        $clients = $this->MarketingTasks->Clients->find('list', ['limit' => 200]);
        $marketResources = $this->MarketingTasks->MarketResources->find('list', ['limit' => 200]);
        //$users = $this->MarketingTasks->Users->find('list', ['limit' => 200]);
        $this->set(compact('marketingTask', 'clients', 'marketResources','task_type'));
        $this->set('_serialize', ['marketingTask']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Marketing Task id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $this->loadModel('Masters');

        $task_type = $this->Masters->find('item', [
            'name' => 'Task type',
            ]);
        
        $marketingTask = $this->MarketingTasks->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $marketingTask = $this->MarketingTasks->patchEntity($marketingTask, $this->request->data);
            $marketingTask->user_id = $this->Auth->user('id');
            if ($this->MarketingTasks->save($marketingTask)) {
                $this->Flash->success(__('The marketing task has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The marketing task could not be saved. Please, try again.'));
            }
        }
        $clients = $this->MarketingTasks->Clients->find('list', ['limit' => 200]);
        $marketResources = $this->MarketingTasks->MarketResources->find('list', ['limit' => 200]);
        //$users = $this->MarketingTasks->Users->find('list', ['limit' => 200]);
        $this->set(compact('marketingTask', 'clients', 'marketResources', 'task_type'));
        $this->set('_serialize', ['marketingTask']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Marketing Task id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $marketingTask = $this->MarketingTasks->get($id);
        if ($this->MarketingTasks->delete($marketingTask)) {
            $this->Flash->success(__('The marketing task has been deleted.'));
        } else {
            $this->Flash->error(__('The marketing task could not be deleted. Please, try again.'));
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
