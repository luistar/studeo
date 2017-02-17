<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;

/**
 * Requirements Controller
 *
 * @property \App\Model\Table\RequirementsTable $Requirements
 */
class RequirementsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['CoursesRequirement','RequiredFor']
        ];
        $requirements = $this->paginate($this->Requirements);

        $this->set(compact('requirements'));
        $this->set('_serialize', ['requirements']);
    }

    /**
     * View method
     *
     * @param string|null $id Requirement id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $requirement = $this->Requirements->get($id, [
            'contain' => ['CoursesRequirement','RequiredFor']
        ]);

        $this->set('requirement', $requirement);
        $this->set('_serialize', ['requirement']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $requirement = $this->Requirements->newEntity();
        if ($this->request->is('post')) {
            $requirement = $this->Requirements->patchEntity($requirement, $this->request->data);
            if ($this->Requirements->save($requirement)) {
                $this->Flash->success(__('The requirement has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The requirement could not be saved. Please, try again.'));
        }
        $courses = TableRegistry::get('Courses')->find('list');
        $this->set(compact('requirement', 'courses'));
        $this->set('_serialize', ['requirement']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Requirement id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $requirement = $this->Requirements->get($id, [
            'contain' => ['CoursesRequirement','RequiredFor']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $requirement = $this->Requirements->patchEntity($requirement, $this->request->data);
            if ($this->Requirements->save($requirement)) {
                $this->Flash->success(__('The requirement has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The requirement could not be saved. Please, try again.'));
        }
        $this->set('requirement',$requirement);
        $courses = TableRegistry::get('Courses')->find('list')->all();
        $this->set('requirement',$requirement);
        $this->set('courses',$courses);
        $this->set('_serialize', ['requirement']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Requirement id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $requirement = $this->Requirements->get($id);
        if ($this->Requirements->delete($requirement)) {
            $this->Flash->success(__('The requirement has been deleted.'));
        } else {
            $this->Flash->error(__('The requirement could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
