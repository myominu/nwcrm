<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Masters Controller
 *
 * @property \App\Model\Table\MastersTable $Masters
 */
class MastersController extends AppController
{

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {

        $this->paginate = [
            'contain' => ['ParentMasters'],
            'order' => [
                'Masters.lft' => 'asc'
            ]
        ];
        $this->set('masters', $this->paginate($this->Masters));
        $this->set('_serialize', ['masters']);
    }

    public function move_up($id = null)
    {
        $this->request->allowMethod(['post', 'put']);
        $masters = $this->Masters->get($id);
        if ($this->Masters->moveUp($masters)) {
            $this->Flash->success('The masters has been moved Up.');
        } else {
            $this->Flash->error('The masters could not be moved up. Please, try again.');
        }
        return $this->redirect($this->referer(['action' => 'index']));
    }

    public function move_down($id = null)
    {
        $this->request->allowMethod(['post', 'put']);
        $masters = $this->Masters->get($id);
        if ($this->Masters->moveDown($masters)) {
            $this->Flash->success('The masters has been moved down.');
        } else {
            $this->Flash->error('The masters could not be moved down. Please, try again.');
        }
        return $this->redirect($this->referer(['action' => 'index']));
    }

    /**
     * View method
     *
     * @param string|null $id Master id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $master = $this->Masters->get($id, [
            'contain' => ['ParentMasters', 'ChildMasters']
        ]);
        $this->set('master', $master);
        $this->set('_serialize', ['master']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $master = $this->Masters->newEntity();
        if ($this->request->is('post')) {
            $master = $this->Masters->patchEntity($master, $this->request->data);
            if ($this->Masters->save($master)) {
                $this->Flash->success(__('The master has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The master could not be saved. Please, try again.'));
            }
        }
        $parentMasters = $this->Masters->ParentMasters->find('treeList', ['limit' => 200]);
        $this->set(compact('master', 'parentMasters'));
        $this->set('_serialize', ['master']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Master id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $master = $this->Masters->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $master = $this->Masters->patchEntity($master, $this->request->data);
            if ($this->Masters->save($master)) {
                $this->Flash->success(__('The master has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The master could not be saved. Please, try again.'));
            }
        }
        $parentMasters = $this->Masters->ParentMasters->find('treeList', ['limit' => 200]);
        $this->set(compact('master', 'parentMasters'));
        $this->set('_serialize', ['master']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Master id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $master = $this->Masters->get($id);
        if ($this->Masters->delete($master)) {
            $this->Flash->success(__('The master has been deleted.'));
        } else {
            $this->Flash->error(__('The master could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
