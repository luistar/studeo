<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Professorships Controller
 *
 * @property \App\Model\Table\ProfessorshipsTable $Professorships
 */
class ProfessorshipsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Professors', 'Courses']
        ];
        $professorships = $this->paginate($this->Professorships);

        $this->set(compact('professorships'));
        $this->set('_serialize', ['professorships']);
    }

    /**
     * View method
     *
     * @param string|null $id Professorship id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $professorship = $this->Professorships->get($id, [
            'contain' => ['Professors', 'Courses']
        ]);

        $this->set('professorship', $professorship);
        $this->set('_serialize', ['professorship']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $professorship = $this->Professorships->newEntity();
        if ($this->request->is('post')) {
            $professorship = $this->Professorships->patchEntity($professorship, $this->request->data);
            if ($this->Professorships->save($professorship)) {
                $this->Flash->success(__('The professorship has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The professorship could not be saved. Please, try again.'));
        }
        $professors_list = $this->Professorships->Professors->find()->select(['id','firstName','lastName']);
        $courses = $this->Professorships->Courses->find('list', ['limit' => 200]);
        
        foreach($professors_list as $professor) {
        	$professors[$professor->id] = $professor->name;
        }
        
        
        $this->set(compact('professorship', 'professors', 'courses'));
        $this->set('_serialize', ['professorship']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Professorship id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $professorship = $this->Professorships->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $professorship = $this->Professorships->patchEntity($professorship, $this->request->data);
            if ($this->Professorships->save($professorship)) {
                $this->Flash->success(__('The professorship has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The professorship could not be saved. Please, try again.'));
        }
        $professors = $this->Professorships->Professors->find('list', ['limit' => 200]);
        $courses = $this->Professorships->Courses->find('list', ['limit' => 200]);
        $this->set(compact('professorship', 'professors', 'courses'));
        $this->set('_serialize', ['professorship']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Professorship id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $professorship = $this->Professorships->get($id);
        if ($this->Professorships->delete($professorship)) {
            $this->Flash->success(__('The professorship has been deleted.'));
        } else {
            $this->Flash->error(__('The professorship could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}