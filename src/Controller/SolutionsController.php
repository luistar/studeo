<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Solutions Controller
 *
 * @property \App\Model\Table\SolutionsTable $Solutions
 */
class SolutionsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Exams', 'Contributors']
        ];
        $solutions = $this->paginate($this->Solutions);

        $this->set(compact('solutions'));
        $this->set('_serialize', ['solutions']);
    }

    /**
     * View method
     *
     * @param string|null $id Solution id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $solution = $this->Solutions->get($id, [
            'contain' => ['Exams', 'Contributors']
        ]);

        $this->set('solution', $solution);
        $this->set('_serialize', ['solution']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $solution = $this->Solutions->newEntity();
        if ($this->request->is('post')) {
            $solution = $this->Solutions->patchEntity($solution, $this->request->data);
            if ($this->Solutions->save($solution)) {
                $this->Flash->success(__('The solution has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The solution could not be saved. Please, try again.'));
            }
        }
        $exams = $this->Solutions->Exams->find('list', ['limit' => 200]);
        $contributors = $this->Solutions->Contributors->find('list', ['limit' => 200]);
        $this->set(compact('solution', 'exams', 'contributors'));
        $this->set('_serialize', ['solution']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Solution id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $solution = $this->Solutions->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $solution = $this->Solutions->patchEntity($solution, $this->request->data);
            if ($this->Solutions->save($solution)) {
                $this->Flash->success(__('The solution has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The solution could not be saved. Please, try again.'));
            }
        }
        $exams = $this->Solutions->Exams->find('list', ['limit' => 200]);
        $contributors = $this->Solutions->Contributors->find('list', ['limit' => 200]);
        $this->set(compact('solution', 'exams', 'contributors'));
        $this->set('_serialize', ['solution']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Solution id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $solution = $this->Solutions->get($id);
        if ($this->Solutions->delete($solution)) {
            $this->Flash->success(__('The solution has been deleted.'));
        } else {
            $this->Flash->error(__('The solution could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
