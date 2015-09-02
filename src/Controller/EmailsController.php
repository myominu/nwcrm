<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Emails Controller
 *
 * @property \App\Model\Table\EmailsTable $Emails
 */
class EmailsController extends AppController
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
            'contain' => ['Sales']
        ];

        $this->set('emails', $this->paginate($this->Emails->find('searchable', $this->Prg->parsedParams())));
        //$this->set('emails', $this->paginate($this->Emails));
        $this->set('_serialize', ['emails']);
    }

    /**
     * View method
     *
     * @param string|null $id Email id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $email = $this->Emails->get($id, [
            'contain' => ['Sales']
        ]);
        $this->set('email', $email);
        $this->set('_serialize', ['email']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $email = $this->Emails->newEntity();
        if ($this->request->is('post')) {
            $email = $this->Emails->patchEntity($email, $this->request->data);
            if ($this->Emails->save($email)) {
                $this->Flash->success(__('The email has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The email could not be saved. Please, try again.'));
            }
        }
        $sales = $this->Emails->Sales->find('list', ['limit' => 200]);
        $this->set(compact('email', 'sales'));
        $this->set('_serialize', ['email']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Email id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $email = $this->Emails->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $email = $this->Emails->patchEntity($email, $this->request->data);
            if ($this->Emails->save($email)) {
                $this->Flash->success(__('The email has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The email could not be saved. Please, try again.'));
            }
        }
        $sales = $this->Emails->Sales->find('list', ['limit' => 200]);
        $this->set(compact('email', 'sales'));
        $this->set('_serialize', ['email']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Email id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $email = $this->Emails->get($id);
        if ($this->Emails->delete($email)) {
            $this->Flash->success(__('The email has been deleted.'));
        } else {
            $this->Flash->error(__('The email could not be deleted. Please, try again.'));
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
