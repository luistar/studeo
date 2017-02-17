<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Professors Controller
 *
 * @property \App\Model\Table\ProfessorsTable $Professors
 */
class ProfessorsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $professors = $this->Professors->find()->all();

        $this->set(compact('professors'));
        $this->set('_serialize', ['professors']);
    }

    /**
     * View method
     *
     * @param string|null $id Professor id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $professor = $this->Professors->get($id, [
            'contain' => ['Professorships'=>['Professors']]
        ]);

        $this->set('professor', $professor);
        $this->set('_serialize', ['professor']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $professor = $this->Professors->newEntity();
        if ($this->request->is('post')) {
            $professor = $this->Professors->patchEntity($professor, $this->request->data);
            if ($this->Professors->save($professor)) {
                $this->Flash->success(__('The professor has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The professor could not be saved. Please, try again.'));
        }
        $this->set(compact('professor'));
        $this->set('_serialize', ['professor']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Professor id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $professor = $this->Professors->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $professor = $this->Professors->patchEntity($professor, $this->request->data);
            if ($this->Professors->save($professor)) {
                $this->Flash->success(__('The professor has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The professor could not be saved. Please, try again.'));
        }
        $this->set(compact('professor'));
        $this->set('_serialize', ['professor']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Professor id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $professor = $this->Professors->get($id);
        if ($this->Professors->delete($professor)) {
            $this->Flash->success(__('The professor has been deleted.'));
        } else {
            $this->Flash->error(__('The professor could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
