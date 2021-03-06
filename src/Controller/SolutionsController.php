<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;

/**
 * Solutions Controller
 *
 * @property \App\Model\Table\SolutionsTable $Solutions
 */
class SolutionsController extends AppController
{
	
	public function isAuthorized($user = null){
		$action = $this->request->params['action'];
		if(in_array($action,['index','addToExam','add']))
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
    	/*
        $this->paginate = [
            'contain' => ['Exams']
        ];
        $solutions = $this->paginate($this->Solutions);
        */
    	$solutions = $this->Solutions->find('all',['contain'=>['Exams'=>['Professorships'=>['Courses','Professors']]]]);
    	foreach($solutions as $solution){
    		$solution->author = TableRegistry::get('PhpbbUsers')->find()->where(['user_id'=>$solution->author])->first();
    	}
        
        $query = $this->Solutions->find();
        $bestAdders = $query->select([
        		'count' => $query->func()->count('*'),
        		'user' => 'addedBy'
        ])->where(['addedBy IS NOT'=>'NULL'])
        ->group('addedBy')->limit(5)->all();
        
        $query2 = $this->Solutions->find();
        $bestAuthors = $query2->select([
        		'count' => $query2->func()->count('*'),
        		'user' => 'author'
        ])->where(['author IS NOT'=>'NULL'])
        ->group('author')->orderDesc('count')->limit(5)->all();
        
        foreach($bestAuthors as $author){
        	$author['user'] = TableRegistry::get('PhpbbUsers')->find()->where(['user_id'=>$author['user']])->first();
        }

        $this->set('bestAdders',$bestAdders);
        $this->set('bestAuthors',$bestAuthors);
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
            'contain' => ['Exams']
        ]);
        
        $author = ($solution->author ? TableRegistry::get('PhpbbUsers')->get($solution->author) : $solution->authorAlt);
        $addedBy= TableRegistry::get('PhpbbUsers')->get($solution->addedBy);

        $this->set('author',$author);
        $this->set('addedBy',$addedBy);
        $this->set('solution', $solution);
        $this->set('_serialize', ['solution']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
    	
    	$exams = $this->Solutions->Exams->find('list')->all();
    	if($exams->count()==0){
    		$this->Flash->error(__("No exams yet. You cannot add solutions until there is at least one exam."));
    		return $this->redirect(['controller'=>'Solutions','action'=>'index']); //redirect to solutions index
    	}
        $solution = $this->Solutions->newEntity();
        if ($this->request->is('post')) {
            $solution = $this->Solutions->patchEntity($solution, $this->request->data);
            $solution->addedBy = $this->Auth->user('user_id');
            if ($this->Solutions->save($solution)) {
                $this->Flash->success(__('The solution has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The solution could not be saved. Please, try again.'));
        }
        $this->set(compact('solution', 'exams'));
        $this->set('_serialize', ['solution']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Solution id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
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
            }
            $this->Flash->error(__('The solution could not be saved. Please, try again.'));
        }
        $exams = $this->Solutions->Exams->find('list', ['limit' => 200]);
        $this->set(compact('solution', 'exams'));
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
    
    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function addToExam($id=null)
    {
    	$exam = TableRegistry::get('Exams')->get($id,['contain'=>['Professorships'=>['Courses','Professors']]]);
    	if(!$exam){
    		$this->Flash->error(__('Invalid exam.'));
    		return $this->redirect($this->referer());
    	}
    	$solution = $this->Solutions->newEntity();
    	if ($this->request->is('post')) {
    		$solution = $this->Solutions->patchEntity($solution, $this->request->data);
    		$solution->exam_id = $exam->id;
    		$solution->addedBy = $this->Auth->user('user_id');
    		if ($this->Solutions->save($solution)) {
    			$this->Flash->success(__('The solution has been saved.'));
    
    			return $this->redirect(['action' => 'index']);
    		}
    		$this->Flash->error(__('The solution could not be saved. Please, try again.'));
    	}
    	$this->set('exam',$exam);
    	$this->set(compact('solution', 'exams'));
    	$this->set('_serialize', ['solution']);
    }
}
