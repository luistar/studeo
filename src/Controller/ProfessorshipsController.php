<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;

/**
 * Professorships Controller
 *
 * @property \App\Model\Table\ProfessorshipsTable $Professorships
 */
class ProfessorshipsController extends AppController
{

	public function isAuthorized($user = null){
		$action = $this->request->params['action'];
		if(in_array($action,['view']))
			return true; //all logged users can access these actions
			return parent::isAuthorized($user);
	}
	
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
            'contain' => ['Professors', 'Courses','Exams'=>['Solutions']]
        ]);
        
        foreach($professorship->exams as $exam){
        	foreach($exam->solutions as $solution){
        		if($solution->author){
        			$solution->userAuthor = TableRegistry::get('PhpbbUsers')->get($solution->author);
        		}
        	}
        }

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
    	$professors_list = $this->Professorships->Professors->find()->select(['id','firstName','lastName'])->orderAsc('lastName')->all();
        if($professors_list->count()==0){
        	$this->Flash->error(__("No professors yet. You cannot add professorships until there is at least one professor."));
        	return $this->redirect(['controller'=>'Professorships','action'=>'index']); //redirect to professorships index
        }
        $courses = $this->Professorships->Courses->find('list')->orderAsc('name');
        if($courses->count()==0){
        	$this->Flash->error(__("No courses yet. You cannot add professorships until there is at least one course."));
        	return $this->redirect(['controller'=>'Professorships','action'=>'index']); //redirect to professorships index
        }
    	$professorship = $this->Professorships->newEntity();
        if ($this->request->is('post')) {
            $professorship = $this->Professorships->patchEntity($professorship, $this->request->data);
            if ($this->Professorships->save($professorship)) {
                $this->Flash->success(__('The professorship has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The professorship could not be saved. Please, try again.'));
        }
        
        
        foreach($professors_list as $professor) {
        	$professors[$professor->id] = $professor->lastName . ' ' . $professor->firstName;
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
