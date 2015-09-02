<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Sales Controller
 *
 * @property \App\Model\Table\SalesTable $Sales
 */
class SalesController extends AppController
{

    public $components = array(
        'Search.Prg'
    );

    //before filter
    public function beforeFilter(\Cake\Event\Event $event)
    {
        parent::beforeFilter($event);
        
        if (empty($this->request->query)) {
            $this->request->query['date']['year'] = date('Y');
            $this->request->query['date']['month'] = date('m');
        }
    }

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {

        $this->Prg->commonProcess();

        $this->paginate = [
            'contain' => ['Items', 'Clients'],
            'order' => ['Sales.item_extend_end_date' => 'DESC']
        ];

        $this->set('sales', $this->paginate($this->Sales->find('searchable', $this->Prg->parsedParams())));
        //$this->set('sales', $this->paginate($this->Sales));
        $this->set('_serialize', ['sales']);
    }

    /**
     * View method
     *
     * @param string|null $id Sale id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $sale = $this->Sales->get($id, [
            'contain' => ['Items', 'Clients']
        ]);
        $this->set('sale', $sale);
        $this->set('_serialize', ['sale']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $sale = $this->Sales->newEntity();
        if ($this->request->is('post')) {
            $sale = $this->Sales->patchEntity($sale, $this->request->data);
            if ($this->Sales->save($sale)) {
                $this->Flash->success(__('The sale has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The sale could not be saved. Please, try again.'));
            }
        }
        $items = $this->Sales->Items->find('list', ['limit' => 200]);
        $clients = $this->Sales->Clients->find('list', ['limit' => 200]);
        $this->set(compact('sale', 'items', 'clients'));
        $this->set('_serialize', ['sale']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Sale id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $sale = $this->Sales->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $sale = $this->Sales->patchEntity($sale, $this->request->data);
            if ($this->Sales->save($sale)) {
                $this->Flash->success(__('The sale has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The sale could not be saved. Please, try again.'));
            }
        }
        $items = $this->Sales->Items->find('list', ['limit' => 200]);
        $clients = $this->Sales->Clients->find('list', ['limit' => 200]);
        $this->set(compact('sale', 'items', 'clients'));
        $this->set('_serialize', ['sale']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Sale id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $sale = $this->Sales->get($id);
        if ($this->Sales->delete($sale)) {
            $this->Flash->success(__('The sale has been deleted.'));
        } else {
            $this->Flash->error(__('The sale could not be deleted. Please, try again.'));
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
