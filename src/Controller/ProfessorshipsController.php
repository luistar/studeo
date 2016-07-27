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
            'contain' => ['Groups', 'Professors']
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
            'contain' => ['Groups', 'Professors', 'Exams']
        ]);

        $this->set('professorship', $professorship);
        $this->set('_serialize', ['professorship']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $professorship = $this->Professorships->newEntity();
        if ($this->request->is('post')) {
            $professorship = $this->Professorships->patchEntity($professorship, $this->request->data);
            if ($this->Professorships->save($professorship)) {
                $this->Flash->success(__('The professorship has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The professorship could not be saved. Please, try again.'));
            }
        }
        /* Acquiring groups */
        $groups = $this->Professorships->Groups->find()->contain(['Courses'])->all();
        $groupOptions = []; //will contain human-readable content for the select input
        foreach($groups as $group){
        	$groupOptions[$group->id]= strtoupper($group->course->name).' - '.strtoupper($group->name);
        }
        $groups = $groupOptions;
        
        /* Acquiring professors */
        $professors = $this->Professorships->Professors->find()->all();
        $professorsOptions = []; //will contain human-readable content for the select input
        foreach($professors as $professor){
        	$professorsOptions[$professor->id]=strtoupper($professor->first_name).' '.strtoupper($professor->last_name);
        }
        $professors = $professorsOptions;
        
        $this->set(compact('professorship', 'groups', 'professors'));
        $this->set('_serialize', ['professorship']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Professorship id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
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
            } else {
                $this->Flash->error(__('The professorship could not be saved. Please, try again.'));
            }
        }
        $groups = $this->Professorships->Groups->find('list', ['limit' => 200]);
        $professors = $this->Professorships->Professors->find('list', ['limit' => 200]);
        $this->set(compact('professorship', 'groups', 'professors'));
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
