<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Contributors Controller
 *
 * @property \App\Model\Table\ContributorsTable $Contributors
 */
class ContributorsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $contributors = $this->paginate($this->Contributors);

        $this->set(compact('contributors'));
        $this->set('_serialize', ['contributors']);
    }

    /**
     * View method
     *
     * @param string|null $id Contributor id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $contributor = $this->Contributors->get($id, [
            'contain' => ['Exts', 'Solutions']
        ]);

        $this->set('contributor', $contributor);
        $this->set('_serialize', ['contributor']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $contributor = $this->Contributors->newEntity();
        if ($this->request->is('post')) {
            $contributor = $this->Contributors->patchEntity($contributor, $this->request->data);
            if ($this->Contributors->save($contributor)) {
                $this->Flash->success(__('The contributor has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The contributor could not be saved. Please, try again.'));
            }
        }
        $exts = $this->Contributors->Exts->find('list', ['limit' => 200]);
        $this->set(compact('contributor', 'exts'));
        $this->set('_serialize', ['contributor']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Contributor id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $contributor = $this->Contributors->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $contributor = $this->Contributors->patchEntity($contributor, $this->request->data);
            if ($this->Contributors->save($contributor)) {
                $this->Flash->success(__('The contributor has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The contributor could not be saved. Please, try again.'));
            }
        }
        $exts = $this->Contributors->Exts->find('list', ['limit' => 200]);
        $this->set(compact('contributor', 'exts'));
        $this->set('_serialize', ['contributor']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Contributor id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $contributor = $this->Contributors->get($id);
        if ($this->Contributors->delete($contributor)) {
            $this->Flash->success(__('The contributor has been deleted.'));
        } else {
            $this->Flash->error(__('The contributor could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
