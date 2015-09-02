<?php
namespace App\Controller;

use App\Controller\AppController;
/**
 * CashReceipts Controller
 *
 * @property \App\Model\Table\CashReceiptsTable $CashReceipts
 */
class CashReceiptsController extends AppController
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
            'contain' => ['Clients'],
            'order' => ['CashReceipts.balance_flg' => 'DESC']
        ];

        $this->set('cashReceipts', $this->paginate($this->CashReceipts->find('searchable', $this->Prg->parsedParams())));
        //$this->set('cashReceipts', $this->paginate($this->CashReceipts));
        $this->set('_serialize', ['cashReceipts']);
    }

    /**
     * View method
     *
     * @param string|null $id Cash Receipt id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    { 

        $cashReceipt = $this->CashReceipts->get($id, [
            'contain' => ['Clients', 'Sales']
        ]);

        if ($this->request->is(['patch', 'post', 'put'])) {

            // print_r($this->request->data);
            // die();
            $cashReceipt = $this->CashReceipts->patchEntity($cashReceipt, $this->request->data, [
                'associated' => [
                    'Sales',                    
                    //'Sales._joinData',
                ]
            ]);
            if ($this->CashReceipts->save($cashReceipt)) {
                $this->Flash->success(__('The cash receipt has been saved.'));
                return $this->redirect(['action' => 'view', $id]);
            } else {
                $this->Flash->error(__('The cash receipt could not be saved. Please, try again.'));
            }
        }

        $this->set('cashReceipt', $cashReceipt);
        $this->set('_serialize', ['cashReceipt']);
    }

    public function view_balance($id = null)
    { 

        $cashReceipt = $this->CashReceipts->get($id, [
            'contain' => ['Clients', 'Sales']
        ]);

        if ($this->request->is(['patch', 'post', 'put'])) {
            $cashReceipt = $this->CashReceipts->patchEntity($cashReceipt, $this->request->data);
            if ($this->CashReceipts->save($cashReceipt)) {
                $this->Flash->success(__('The cash receipt has been saved.'));
                return $this->redirect(['action' => 'view_balance', $id]);
            } else {
                $this->Flash->error(__('The cash receipt could not be saved. Please, try again.'));
            }
        }

        $this->set('cashReceipt', $cashReceipt);
        $this->set('_serialize', ['cashReceipt']);
    }


    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {

        $cashReceipt = $this->CashReceipts->newEntity();

        if ($this->request->is('post')) {
            
            $cashReceipt = $this->CashReceipts->patchEntity($cashReceipt, $this->request->data, [
                'associated' => [
                    'Sales',
                    'Sales._joinData',
                    //'CashReceiptsSales'  
                ]
            ]);
            // print_r($this->request->data);
            // die();
            if ($this->CashReceipts->save($cashReceipt)) {
                $this->Flash->success(__('The cash receipt has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The cash receipt could not be saved. Please, try again.'));
            }
        }
        $clients = $this->CashReceipts->Clients->find('list', ['limit' => 200]);
        //$sales = $this->CashReceipts->Sales->find('list', ['limit' => 200]);
        $this->set(compact('cashReceipt', 'clients'));
        $this->set('_serialize', ['cashReceipt']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Cash Receipt id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {

        $this->loadModel('Masters');

        $cash_type = $this->Masters->find('item', [
            'name' => 'Cash type',
            ]);

        $cashReceipt = $this->CashReceipts->get($id, [
            'contain' => ['Sales']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $cashReceipt = $this->CashReceipts->patchEntity($cashReceipt, $this->request->data, [
                'associated' => [
                    'Sales',
                    'Sales._joinData',
                    //'CashReceiptsSales'  
                ]
            ]);
            if ($this->CashReceipts->save($cashReceipt)) {
                $this->Flash->success(__('The cash receipt has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The cash receipt could not be saved. Please, try again.'));
            }
        }
        $clients = $this->CashReceipts->Clients->find('list', ['limit' => 200]);
        //$sales = $this->CashReceipts->Sales->find('list', ['limit' => 200]);       

        $this->set(compact('cashReceipt', 'clients', 'cash_type'));
        $this->set('_serialize', ['cashReceipt']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Cash Receipt id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $cashReceipt = $this->CashReceipts->get($id);
        if ($this->CashReceipts->delete($cashReceipt)) {
            $this->Flash->success(__('The cash receipt has been deleted.'));
        } else {
            $this->Flash->error(__('The cash receipt could not be deleted. Please, try again.'));
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
