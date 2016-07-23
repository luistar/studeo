<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * ProfessorEmails Controller
 *
 * @property \App\Model\Table\ProfessorEmailsTable $ProfessorEmails
 */
class ProfessorEmailsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Professors']
        ];
        $professorEmails = $this->paginate($this->ProfessorEmails);

        $this->set(compact('professorEmails'));
        $this->set('_serialize', ['professorEmails']);
    }

    /**
     * View method
     *
     * @param string|null $id Professor Email id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $professorEmail = $this->ProfessorEmails->get($id, [
            'contain' => ['Professors']
        ]);

        $this->set('professorEmail', $professorEmail);
        $this->set('_serialize', ['professorEmail']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $professorEmail = $this->ProfessorEmails->newEntity();
        if ($this->request->is('post')) {
            $professorEmail = $this->ProfessorEmails->patchEntity($professorEmail, $this->request->data);
            if ($this->ProfessorEmails->save($professorEmail)) {
                $this->Flash->success(__('The professor email has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The professor email could not be saved. Please, try again.'));
            }
        }
        $professors = $this->ProfessorEmails->Professors->find('list', ['limit' => 200]);
        $this->set(compact('professorEmail', 'professors'));
        $this->set('_serialize', ['professorEmail']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Professor Email id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $professorEmail = $this->ProfessorEmails->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $professorEmail = $this->ProfessorEmails->patchEntity($professorEmail, $this->request->data);
            if ($this->ProfessorEmails->save($professorEmail)) {
                $this->Flash->success(__('The professor email has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The professor email could not be saved. Please, try again.'));
            }
        }
        $professors = $this->ProfessorEmails->Professors->find('list', ['limit' => 200]);
        $this->set(compact('professorEmail', 'professors'));
        $this->set('_serialize', ['professorEmail']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Professor Email id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $professorEmail = $this->ProfessorEmails->get($id);
        if ($this->ProfessorEmails->delete($professorEmail)) {
            $this->Flash->success(__('The professor email has been deleted.'));
        } else {
            $this->Flash->error(__('The professor email could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
