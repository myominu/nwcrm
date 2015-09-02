<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Invoices Controller
 *
 * @property \App\Model\Table\InvoicesTable $Invoices
 */
class InvoicesController extends AppController
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
            'order' => ['Invoices.balance_flg' => 'DESC']
        ];

        $this->set('invoices', $this->paginate($this->Invoices->find('searchable', $this->Prg->parsedParams())));
        //$this->set('invoices', $this->paginate($this->Invoices));
        $this->set('_serialize', ['invoices']);
    }

    /**
     * View method
     *
     * @param string|null $id Invoice id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $invoice = $this->Invoices->get($id, [
            'contain' => ['Sales','Clients']
        ]);

        if ($this->request->is(['patch', 'post', 'put'])) {

            // print_r($this->request->data);
            // die();
            $invoice = $this->Invoices->patchEntity($invoice, $this->request->data, [
                'associated' => [
                    'Sales',                    
                    //'Sales._joinData',
                ]
            ]);
            if ($this->Invoices->save($invoice)) {
                $this->Flash->success(__('The invoice has been saved.'));
                return $this->redirect(['action' => 'view', $id]);
            } else {
                $this->Flash->error(__('The invoice could not be saved. Please, try again.'));
            }
        }

        $this->set('invoice', $invoice);
        $this->set('_serialize', ['invoice']);
    }
    
    public function view_balance($id = null)
    { 

        $invoice = $this->Invoices->get($id, [
            'contain' => ['Clients', 'Sales']
        ]);

        if ($this->request->is(['patch', 'post', 'put'])) {
            $invoice = $this->Invoices->patchEntity($invoice, $this->request->data);
            if ($this->Invoices->save($invoice)) {
                $this->Flash->success(__('The invoice has been saved.'));
                return $this->redirect(['action' => 'view_balance', $id]);
            } else {
                $this->Flash->error(__('The invoice could not be saved. Please, try again.'));
            }
        }

        $this->set('invoice', $invoice);
        $this->set('_serialize', ['invoice']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $invoice = $this->Invoices->newEntity();
        if ($this->request->is('post')) {
            $invoice = $this->Invoices->patchEntity($invoice, $this->request->data, [
                'associated' => [
                    'Sales',
                    'Sales._joinData',
                ]
            ]);
            if ($this->Invoices->save($invoice)) {
                $this->Flash->success(__('The invoice has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The invoice could not be saved. Please, try again.'));
            }
        }
        //$sales = $this->Invoices->Sales->find('list', ['limit' => 200]);
        $clients = $this->Invoices->Clients->find('list', ['limit' => 200]);
        $this->set(compact('invoice', 'clients'));
        $this->set('_serialize', ['invoice']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Invoice id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $this->loadModel('Masters');

        $cash_type = $this->Masters->find('item', [
            'name' => 'Cash type',
            ]);

        $invoice = $this->Invoices->get($id, [
            'contain' => ['Sales']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $invoice = $this->Invoices->patchEntity($invoice, $this->request->data, [
                'associated' => [
                    'Sales',
                    'Sales._joinData',
                ]
            ]);
            if ($this->Invoices->save($invoice)) {
                $this->Flash->success(__('The invoice has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The invoice could not be saved. Please, try again.'));
            }
        }
        //$sales = $this->Invoices->Sales->find('list', ['limit' => 200]);
        $clients = $this->Invoices->Clients->find('list', ['limit' => 200]);
        $this->set(compact('invoice', 'clients', 'cash_type'));
        $this->set('_serialize', ['invoice']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Invoice id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $invoice = $this->Invoices->get($id);
        if ($this->Invoices->delete($invoice)) {
            $this->Flash->success(__('The invoice has been deleted.'));
        } else {
            $this->Flash->error(__('The invoice could not be deleted. Please, try again.'));
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
